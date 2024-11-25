<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BlogCategory,Blog};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->product) {
            $data['product'] = Blog::where(['id'=>$request->product])->first();
        }
      $data['cat'] = BlogCategory::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('admin.blog',$data);
    }//end of method

    public function view()
    {
     
      return view('admin.view_product');
    }//end of method
    
    public function save(Request $request){
        // print_r($request->all());
        // die;
        $id = $request->id;
        if (!empty($id)) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'cat'=>'required',
                'desc'=>'required',

            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'cat'=>'required',
                'desc'=>'required',
                'image'=>'required',
               
            ]);
        }
        if($validator->passes()) {
                    
            $formdata['name'] = $request->name;
            $formdata['cat_id'] = $request->cat;
            $formdata['description'] = $request->desc;
 
            
            if(!empty($request->file('image'))){
                    $img = $request->file('image');
                    $filedata['path'] = $formdata['image'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image')->move(public_path('uploads'), $formdata['image']);
            }

            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = Blog::where('id',$id)->update($formdata);
                $row=$id;
                $msg = 'Data Updated';
            }else{
                $formdata['added_by'] = Auth::user()->id;
                $row = Blog::insertGetId($formdata);
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
            $data = Blog::where(['blogs.is_deleted'=>0])->join('blog_categories','blog_categories.id','=','blogs.cat_id')->orderBy('id','DESC')->get(['blogs.id','blogs.name','blogs.description','blogs.image','blogs.active_status','blog_categories.name as category']);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li> <a href="'.route('blog-management.index',['product'=>$row->id]).'" class="edit"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> </li>';

                           $btn .='<li onclick="deletes(\''.$row->id.'\')"> <a href="javascript:void[0]" class="remove"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </li> ';
                           $btn .= '</ul>';
                            return $btn;
                    })

                    ->addColumn('image', function($row){
                        if ($row->image) {
                           $btn = '<a href="'.$row->image.'" target = "_blank"><img style="height: 50px; width:50px" src="'.$row->image.'"></a><br>';
                           if ($row->path) {
                               $img = explode(',', $row->path);
                               foreach ($img as $key => $value) {
                                   $btn.='<a href="'.$value.'" target = "_blank" class="p-2"><i class="fa fa-image"></i></a>';
                               }
                           }
                        }else{
                           $btn = '<img style="height: 50px; width:50px" src="'.asset('uploads/default/default-user.jpg').'">';
                       }
                          
                            return $btn;
                    })


                    ->addColumn('descr', function($row){
                        $btn ="";
                        $btn.= '<span id="hide'.$row->id.'">'.substr($row->description, 0,2).'...';

                        $btn.= '<a href="javascript:void[0]" onclick="show('.$row->id.')">Read</a></span>';

                        $btn.= '<span style="display:none" id="show'.$row->id.'">'.$row->description.'...<a href="javascript:void[0]" onclick="hide('.$row->id.')">Read Less</a></span>';
                           
                        
                          
                            return $btn;
                    })

                    ->addColumn('status', function($row){
                        $btn = '';
                        if ($row->active_status == 1) {
                           $btn .= '<span class="badge badge-success" style="cursor:pointer;" onclick="status('.$row->id.',0)">Active</span>';
                        }else{
                           $btn .= '<span class="badge badge-warning" style="cursor:pointer;" onclick="status('.$row->id.',1)">De-Active</span>';


                        }
                          
                            return $btn;
                    })
                    ->rawColumns(['image','action','status','descr'])
                    ->make(true);
        }
    }//end of method

    public function edit(request $request){
        $data = Blog::join('product_images','product_images.prd_id','=','products.id')->where('products.id',$request->id)->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id',DB::raw('GROUP_CONCAT(path) as path')]);
        if(empty($data)){
            return ['message'=>"Something went wrong !",'status_code'=>201];
        }else{
            return ['message'=>'Success !','status_code'=>200 , 'data' => $data];
        }

    }//end of method

    public function delete(Request $request){
        $data['is_deleted'] = 1;
        $formdata['deleted_by'] = Auth::user()->id;
        $row = Blog::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Delete!",'status_code'=>201];
        }else{
            return ['message'=>'Deleted !','status_code'=>200];
        }
    }//end of method


    public function price_calc(Request $request){

        $comm = array();
        $data = Blog::join('product_variants','product_variants.prod_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->where('products.id',$request->id)->groupBy('product_variants.prod_id')->first(['products.price','products.cat_id','categories.commision',DB::raw('GROUP_CONCAT(product_variants.price) as price'),DB::raw('GROUP_CONCAT(product_variants.variant) as variant')]);
        $new_commision = VendorCommision::where(['user_id'=>Auth::user()->id,'cat_id'=>$data->cat_id])->first();
        if ($new_commision) {
            foreach (explode(',', $data->price) as $key => $value) {
                $comm[$key]['commision'] = ($new_commision->commision / 100) * $value;
                $comm[$key]['price'] = $value ;
                $comm[$key]['you_get'] = $value - $comm[$key]['commision'] ;
                $comm[$key]['variation'] = explode(',', $data->variant)[$key] ;
            }
        }else{
            foreach (explode(',', $data->price) as $key => $value) {
                $comm[$key]['commision'] = ($data->commision / 100) * $value;
                $comm[$key]['price'] = $value ;
                $comm[$key]['you_get'] = $value - $comm[$key]['commision'] ;
                $comm[$key]['variation'] = explode(',', $data->variant)[$key] ;
            }
        }
   
        if(empty($comm)){
            return ['message'=>"Can't ",'status_code'=>201];
        }else{
            return ['message'=>$comm,'status_code'=>200];
        }
    }//end of method

    public function status(Request $request){
        $data['active_status'] = $request->status;
        $data['updated_by'] = Auth::user()->id;
        $row = Blog::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Update Status!",'status_code'=>201];
        }else{
            return ['message'=>'Status Updated!','status_code'=>200];
        }
    }//end of method


    public function sub_cat(request $request) 
    {
        $cat_id = $request->cat_id;
        $status= SubCategory::where(['is_deleted'=>0,'active_status'=>1,'cat_id'=>$cat_id])->get(['id','name']);
        return $status;
    }
}
