<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetail,Contact};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    public function index()
    {
      return view('admin.order');
    }//end of method
    public function contact()
    {
      return view('admin.contact');
    }//end of method

    public function order_detail(Request $request)
    {
        $data['order'] = Order::where(['is_deleted'=>0,'active_status'=>0, 'id' =>$request->id])->first();

        $data['order_details'] = OrderDetail::join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.added_by'=>Auth::user()->id,'products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id])->get(['products.name','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','order_details.id']);
        // dd($data['order_details']);
      return view('admin.order_detail',$data);
    }//end of method



    public function show(Request $request){
        if ($request->ajax()) {
            $data = Order::query();
            if(!empty($request->startDate) && !empty($request->endDate)){
                $data=$data->whereRaw('date(orders.created_at)>="'.date("Y-m-d",strtotime($request->startDate)).'" and date(orders.created_at)<="'.date("Y-m-d",strtotime($request->endDate)).'"');
            }else{
                $data=$data->whereRaw('date(orders.created_at)="'.date("Y-m-d").'"');
            }
            
            if(!empty($request->paymentMethod)){
                $data=$data->where('orders.city',$request->paymentMethod);
            }
            $data=$data->join('order_details','order_details.order_id','=','orders.id')->join('products','order_details.prod_id','=','products.id')->where(['orders.is_deleted'=>0,'orders.active_status'=>1])->groupby('order_details.order_id')->orderBy('id','DESC')->get(['orders.id','orders.name','orders.email','orders.mobile','orders.address','orders.country','orders.city','orders.state','orders.address','orders.pincode','orders.tax','orders.discount','orders.total','orders.order_status','orders.created_at']);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li > <a href="'.route('BillPrint',['id'=>$row->id]).'" class="edit" target="_blank"> <i class="fa fa-eye"></i></a> </li>';

                           
                           $btn .= '</ul>';
                            return $btn;
                    })

                    ->addColumn('info', function($row){
                        $btn = '';
                           $btn.= 'Order-id:-<span class="badge badge-success" style="cursor:pointer;">'.$row->id.'</span>';

                           $btn.= '<br>name:-<strong>'.$row->name.'</strong>';
                           
                           $btn.= '<br>Mobile:-<strong>'.$row->mobile.'</strong>';
                           $btn.= '<br>Payment Method:-<strong>'.$row->city.'</strong>';
                          
                            return $btn;
                    })

                    // ->addColumn('location', function($row){
                    //       $btn = '';
                    //         $btn.= '<br>Country:-<strong>'.$row->country.'</strong>';
                    //       $btn.= '<br>State:-<strong>'.$row->state.'</strong>';
                    //       $btn.= '<br>City:-<strong>'.$row->city.'</strong>';
                    //       $btn.= '<br>Pincode:-<strong>'.$row->pincode.'</strong>';
                          
                    //         return $btn;
                    // })

                    ->addColumn('order_date', function($row){
                           // $btn = date('d M Y', strtotime($row->created_at));
                           
                          
                           //  return $btn;

                         $btn = '';
                            $btn.= '<br>Order Date:-<strong>'.date('d M Y', strtotime($row->created_at)).'</strong>';
                           $btn.= '<br>Total Amount:- &#8377;<strong>'.$row->total.'</strong>';
                          
                            return $btn;
                    })

                    ->rawColumns(['info','action','order_date'])
                    ->make(true);
        }
    }//end of method
    public function contactShow(Request $request){
        if ($request->ajax()) {
            $data = Contact::query();
           
            $data=$data->orderBy('id','DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->rawColumns([])
                    ->make(true);
        }
    }//end of method
    public function export(Request $request){
        // $datas = [
        //     ['Name','Email','Phone','Subject','Message'],
        //     ['John Doe', 30, 'john@example.com'],
        //     ['Jane Smith', 25, 'jane@example.com'],
        //     // Add more data as needed
        // ];
        $datas[0] = array('Name','Email','Phone','Subject','Message');

        $data = Contact::query();
           
            $data=$data->orderBy('id','DESC')->get();
        foreach ($data as $key => $value) {
            $datas[$key+1] = array($value->name,$value->email,$value->phone,$value->subject,$value->message);
        }
        
        // Output CSV headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export.csv"');
        
        // Open output stream
        $output = fopen('php://output', 'w');
        
        // Write data to the CSV file
        foreach ($datas as $row) {
            fputcsv($output, $row);
        }
        
        // Close the output stream
        fclose($output);
    }//end of method

    public function order_status(Request $request){
        $data['order_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = OrderDetail::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method

}
