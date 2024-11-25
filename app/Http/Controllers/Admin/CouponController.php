<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Coupon,Role};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class CouponController extends Controller
{
    public function index()
    {
      $data['role'] = Role::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('admin.coupon',$data);
    }//end of method
    
    public function save(Request $request){
        // dd($request->all(),explode('to', $request->validity),strtoupper(uniqid('MV-')));
        $id = $request->id;
        // if (!empty($id)) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'type'=>'required',
                'limit'=>'required_with:usage',
                'value'=>'required',
                'validity'=>'required',
                'order_amount'=>'required',
                'max_discount'=>'required',
            ]);
        // }else{
        //     $validator = Validator::make($request->all(),[
        //         'name'=>'required',
        //     ]);
        // }
        if($validator->passes()) {
            $date = explode('to', $request->validity);
            $formdata['name'] = $request->name;
            $formdata['type'] = $request->type;
            $formdata['usage'] = $request->usage;
            $formdata['value'] = $request->value;
            $formdata['max_discount'] = $request->max_discount;
            $formdata['usage_limit'] = $request->limit;
            $formdata['validity_from'] = $date[0];
            $formdata['validity_to'] = $date[1];
            $formdata['order_amount'] = $request->order_amount;
           
            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = Coupon::where('id',$id)->update($formdata);
                $msg = 'Data Updated';
            }else{
                $formdata['code'] = strtoupper(uniqid('MV-'));
                $formdata['added_by'] = Auth::user()->id;
                $row = Coupon::insertGetId($formdata);
                $msg = 'Data Inserted';

            }
           
            if($row){
                return ['status_code' => 200 , 'message' =>$msg];
            }else{
                return ['status_code' => 201 , 'message' => "Something went wrong !"];
            }
        }    
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function show(Request $request){
        if ($request->ajax()) {
            $data = Coupon::where(['is_deleted'=>0])->orderBy('id','DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           if(Auth::user()->user_type == 1){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li onclick="edit(\''.$row->id.'\')"> <a href="#" class="edit"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> </li>';

                           $btn .='<li onclick="deletes(\''.$row->id.'\')"> <a href="javascript:void[0]" class="remove"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </li> ';
                           $btn .= '</ul>';
                       }else{
                        $btn = '---';
                       }
                            return $btn;
                    })

                    ->addColumn('type', function($row){
                        $btn = "";
                        if ($row->type == 1) {
                           $btn.= '<span class="badge badge-primary">Percentage</span>';
                        }else{
                           $btn.= '<span class="badge badge-primary">Amount</span>';

                        }

                        if ($row->usage== 1) {
                           $btn.= '<span class="badge badge-dark">Limited</span>';
                        }else{
                           $btn.= '<span class="badge badge-dark">Un-Limited</span>';

                        }

                        if ($row->value) {
                           $btn.= '<span class="badge badge-info">'.$row->usage_limit.'</span>';
                        }
                          
                            return $btn;
                    })

                    ->addColumn('validity', function($row){
                           $btn = "";
                           $btn.= '<span class="badge badge-primary">'.date('d/m/Y',strtotime($row->validity_from)).'</span>';
                           $btn.= '<span class="badge badge-info">'.date('d/m/Y',strtotime($row->validity_to)).'</span>';
                       
                          
                            return $btn;
                    })

                    ->addColumn('value', function($row){
                           $btn = "";
                           $btn.= '<strong>Discount Value:-</strong>'.$row->value.'';
                           $btn.= '<br><strong>Max-Discount:-</strong>'.$row->max_discount.'';
                       
                          
                            return $btn;
                    })

                    ->addColumn('status', function($row){
                        if ($row->active_status == 1) {
                           $btn = '<span class="badge badge-success" style="cursor:pointer;" onclick="status('.$row->id.',0)">Active</span>';
                        }else{
                           $btn = '<span class="badge badge-warning" style="cursor:pointer;" onclick="status('.$row->id.',1)">De-Active</span>';

                        }
                          
                            return $btn;
                    })
                    ->rawColumns(['type','value','validity','action','status'])
                    ->make(true);
        }
    }//end of method

    public function edit(request $request){
        $data = Coupon::where('id',$request->id)->first();
        // dd($data);
        if(empty($data)){
            return ['message'=>"Something went wrong !",'status_code'=>201];
        }else{
            return ['message'=>'Success !','status_code'=>200 , 'data' => $data];
        }

    }//end of method

    public function delete(Request $request){
        $data['is_deleted'] = 1;
        $data['deleted_by'] = Auth::user()->id;
        $row = Coupon::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Delete!",'status_code'=>201];
        }else{
            return ['message'=>'Deleted !','status_code'=>200];
        }
    }//end of method


    public function status(Request $request){
        $data['active_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = Coupon::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method
}
