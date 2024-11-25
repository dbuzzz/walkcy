<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Taxation,Brand,Product,ProductImage,ProductVariant,VendorCommision};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;
use Excel;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->product) {
            $data['product'] = Product::join('product_images','product_images.prd_id','=','products.id')->where('products.id',$request->product)->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id',DB::raw('GROUP_CONCAT(path) as path')]);
            $data['variant'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1,'prod_id'=>$request->product])->get();
        }
      $data['cat'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['tax'] = Taxation::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('admin.product',$data);
    }//end of method

    public function view()
    {
    $data['cat'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
    $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
     
      return view('admin.view_product',$data);
    }//end of method

    public function viewVariants(Request $request)
    {
        if ($request->product) {
            $data = Product::query();
            $data = $data->join('product_images','product_images.prd_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id');
            if (Auth::user()->user_type == 3) {
                $data = $data->where('products.added_by',Auth::user()->id);
            }

            if ($request->product) {
                $data = $data->where('products.id',$request->product);
            }
            $data = $data->where(['product_images.is_deleted'=>0,'products.is_deleted'=>0])->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->first(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat',DB::raw('GROUP_CONCAT(path) as path')]);

            $datas['variant'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1,'prod_id'=>$request->product])->get();
        }
        $datas['product'] = $data;
        // dd($datas);
     
      return view('admin.viewProductVariant',$datas);
    }//end of method
    
    public function save(Request $request){
        // print_r($request->all());
        // die;
        $id = $request->id;
        if (!empty($id)) {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'brand'=>'required',
                'cat'=>'required',
                'sub_cat'=>'required',
                'tax'=>'required',
                'qty.*'=>'required',
                'mrp.*'=>'required',
                'price.*'=>'required',
                // 'desc'=>'required',
                'variant.*'=>'required',
                // 'length.*'=>'required',
                // 'breath.*'=>'required',
                // 'height.*'=>'required',
                // 'weight.*'=>'required',
                'color'=>'required',

            ],['qty.*.required'=>'Quantity is required','mrp.*.required'=>'MRP is required','price.*.required'=>'Price is required','variant.*.required'=>'Variant is required','length.*.required'=>'Length is required','breath.*.required'=>'Breath is required','height.*.required'=>'Height is required','weight.*.required'=>'Weight is required']);
        }else{
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'brand'=>'required',
                'cat'=>'required',
                'sub_cat'=>'required',
                'tax'=>'required',
                'qty.*'=>'required',
                'mrp.*'=>'required',
                'price.*'=>'required',
                // 'desc'=>'required',
                'variant.*'=>'required',
                // 'length.*'=>'required',
                // 'breath.*'=>'required',
                // 'height.*'=>'required',
                // 'weight.*'=>'required',
                'image'=>'required',
                'color'=>'required',
               
            ],['qty.*.required'=>'Quantity is required','mrp.*.required'=>'MRP is required','price.*.required'=>'Price is required','variant.*.required'=>'Variant is required','length.*.required'=>'Length is required','breath.*.required'=>'Breath is required','height.*.required'=>'Height is required','weight.*.required'=>'Weight is required']);
        }
        if($validator->passes()) {
                    
            $formdata['name'] = $request->name;
            $formdata['brand_id'] = $request->brand;
            $formdata['cat_id'] = $request->cat;
            $formdata['sub_cat_id'] = $request->sub_cat;
            $formdata['tax_id'] = $request->tax;
            $formdata['mrp'] = $request->mrp[0];
            $formdata['price'] = $request->price[0];
            $formdata['description'] = $request->desc;
            $formdata['description2'] = $request->desc2;
            // $formdata['mrp'] = $request->mrp;
            // $formdata['stock_warning'] = $request->stock_warning;
            // $formdata['length'] = $request->length;
            // $formdata['breath'] = $request->breath;
            // $formdata['height'] = $request->height;
            // $formdata['weight'] = $request->weight;
            
            if(!empty($request->file('image'))){
                    $img = $request->file('image');
                    $filedata['path'] = $formdata['image'] = url('uploads').'/'.uniqid().'-'.$img->getClientOriginalName(); 
                    $request->file('image')->move(public_path('uploads'), $formdata['image']);
            }

           

            if ($request->sale) {
                $formdata['sale'] = $request->sale;
            }else{
                $formdata['sale'] = 0;
            }

            if ($request->return) {
                $formdata['is_return'] = $request->return;
            }else{
                $formdata['is_return'] = 0;
            }

            // if ($request->best_selling) {
            //     $formdata['best_selling'] = $request->best_selling;
            // }else{
            //     $formdata['best_selling'] = 0;
            // }

            if ($request->coupon_valid) {
                $formdata['coupon_valid'] = $request->coupon_valid;
            }else{
                $formdata['coupon_valid'] = 0;
            }

            if ($request->self_shipping) {
                $formdata['self_shipping'] = $request->self_shipping;
            }else{
                $formdata['self_shipping'] = 0;
            }
            if (!empty($id)) {
                $formdata['updated_by'] = Auth::user()->id;
                $row = Product::where('id',$id)->update($formdata);
                $row=$id;
                $msg = 'Data Updated';
            }else{
                $formdata['added_by'] = Auth::user()->id;
                $row = Product::insertGetId($formdata);
                $msg = 'Data Inserted';

            }

            if(!empty($request->variant) ){
                if (!empty($id)) {
                    $rows = ProductVariant::where('prod_id',$id)->delete();
                }
                foreach ($request->variant as $key => $value) {
                    $variantData['variant'] = $request->variant[$key];
                    $variantData['qty'] = $request->qty[$key];
                    $variantData['mrp'] = $request->mrp[$key];
                    $variantData['price'] = $request->price[$key];
                    // $variantData['length'] = $request->length[$key];
                    // $variantData['breath'] = $request->breath[$key];
                    // $variantData['height'] = $request->height[$key];
                    // $variantData['weight'] = $request->weight[$key];
                    $variantData['color'] = $request->color[$key];
                    $variantData['added_by'] = Auth::user()->id;
                    $variantData['prod_id'] = $row; 
                    $last_ids = ProductVariant::insertGetId($variantData);
                }
            }

            if(!empty($request->file('o_image')) ){
                if (!empty($id) and !empty($request->file('o_image'))) {
                    $rows = ProductImage::where('prd_id',$id)->delete();
                }
                foreach ($request->file('o_image') as $key => $value) {
                    $img = $value;
                    $filedata['path'] = url('uploads').'/'.time().'-'.$img->getClientOriginalName(); 
                    $filedata['added_by'] = Auth::user()->id;
                    $filedata['prd_id'] = $row; 
                    $img->move(public_path('uploads'), $filedata['path']);
                    $last_ids = ProductImage::insertGetId($filedata);
                }
            }else{
                    $filedata['added_by'] = Auth::user()->id;
                    $filedata['prd_id'] = $row; 
                    $last_ids = ProductImage::insertGetId($filedata);
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
            $data = Product::query();
            $data = $data->join('product_images','product_images.prd_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id');
            if (Auth::user()->user_type == 3) {
                $data = $data->where('products.added_by',Auth::user()->id);
            }

            if ($request->cat) {
                $data = $data->where('products.cat_id',$request->cat);
            }if ($request->subCat) {
                $data = $data->where('products.sub_cat_id',$request->subCat);
            }if ($request->brand) {
                $data = $data->where('products.brand_id',$request->brand);
            }if ($request->rac) {
                $data = $data->where('categories.commision',$request->rac);
            }
            $data = $data->where(['product_images.is_deleted'=>0,'products.is_deleted'=>0])->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat',DB::raw('GROUP_CONCAT(path) as path')]);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<ul class="orderDatatable_actions mb-0 d-flex flex-wrap" style="min-width:90px;justify-content:unset;"> ';
                           $btn .= '<li> <a href="'.route('product-management.index',['product'=>$row->id]).'" class="edit"> <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a> </li>';

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

                    ->addColumn('permission', function($row){
                        $btn = "";
                        if ($row->sale == 1) {
                           $btn.= '<strong>sale:-</strong><span class="badge badge-success">Yes</span><br>';
                        }else{
                           $btn.= '<strong>sale:-</strong><span class="badge badge-danger">No</span><br>';

                        }

                        if ($row->best_selling== 1) {
                           $btn.= '<strong>Best Seller:-</strong><span class="badge badge-success">Yes</span><br>';
                        }else{
                           $btn.= '<strong>Best Seller:-</strong><span class="badge badge-danger">No</span><br>';

                        }

                        if ($row->is_return== 1) {
                           $btn.= '<strong>Is Return:-</strong><span class="badge badge-success">Yes</span><br>';
                        }else{
                           $btn.= '<strong>Is Return:-</strong><span class="badge badge-danger">No</span><br>';

                        }

                        if ($row->coupon_valid== 1) {
                           $btn.= '<strong>Coupon Valid:-</strong><span class="badge badge-success">Yes</span><br>';
                        }else{
                           $btn.= '<strong>Coupon Valid:-</strong><span class="badge badge-danger">No</span><br>';

                        }

                        if ($row->self_shipping== 1) {
                           $btn.= '<strong>Self Shipping:-</strong><span class="badge badge-success">Yes</span><br>';
                        }else{
                           $btn.= '<strong>Self Shipping:-</strong><span class="badge badge-danger">No</span><br>';

                        }
                          
                            return $btn;
                    })

                    ->addColumn('info', function($row){
                        $btn = "";
                           $btn.= '<strong>Quantity:-</strong><span>'.$row->qty.'</span><br>';
                           $btn.= '<strong>Mrp:-</strong><span>'.$row->mrp.'</span><br>';
                           $btn.= '<strong>Price:-</strong><span>'.$row->price.'</span><br>';
                           $btn.= '<strong>Stock Warning:-</strong><span>'.$row->stock_warning.'</span><br>';
                        
                          
                            return $btn;
                    })->addColumn('info2', function($row){
                        $btn = "";
                           $btn.= '<strong>Tax:-</strong><span>'.$row->tax.'('.$row->value.'%)</span><br>';
                           $btn.= '<strong>Brand:-</strong><span>'.$row->brand.'</span><br>';
                           $btn.= '<strong>Category:-</strong><span>'.$row->cat.'</span><br>';
                           $btn.= '<strong>SubCategory:-</strong><span>'.$row->sub_cat.'</span><br>';
                        
                          
                            return $btn;
                    })

                    ->addColumn('descr', function($row){
                        $btn ="";
                        $btn.= '<span id="hide'.$row->id.'">'.substr($row->description, 0,2).'...';

                        $btn.= '<a href="javascript:void[0]" onclick="show('.$row->id.')">Read</a></span>';

                        $btn.= '<span style="display:none" id="show'.$row->id.'">'.$row->description.'...<a href="javascript:void[0]" onclick="hide('.$row->id.')">Read Less</a></span>';
                           
                        
                          
                            return $btn;
                    })

                    ->addColumn('descr2', function($row){
                        $btn ="";
                        $btn.= '<span id="hide2'.$row->id.'">'.substr($row->description2, 0,2).'...';

                        $btn.= '<a href="javascript:void[0]" onclick="show2('.$row->id.')">Read</a></span>';

                        $btn.= '<span style="display:none" id="show2'.$row->id.'">'.$row->description2.'...<a href="javascript:void[0]" onclick="hide2('.$row->id.')">Read Less</a></span>';
                           
                        
                          
                            return $btn;
                    })

                    ->addColumn('status', function($row){
                        $btn = '';
                        if ($row->active_status == 1) {
                           $btn .= '<span class="badge badge-success" style="cursor:pointer;" onclick="status('.$row->id.',0)">Active</span>';
                        }else{
                           $btn .= '<span class="badge badge-warning" style="cursor:pointer;" onclick="status('.$row->id.',1)">De-Active</span>';


                        }
                           $btn .= '<br><span class="badge badge-primary" style="cursor:pointer;"><a style="color:white" href="'.route('product-management.viewVariants',['product'=>$row->id]).'">View Variants</a></span>';
                          
                            return $btn;
                    })
                    ->rawColumns(['image','status','permission','info','info2','descr','action'])
                    ->make(true);
        }
    }//end of method

    public function edit(request $request){
        $data = Product::join('product_images','product_images.prd_id','=','products.id')->where('products.id',$request->id)->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id',DB::raw('GROUP_CONCAT(path) as path')]);
        if(empty($data)){
            return ['message'=>"Something went wrong !",'status_code'=>201];
        }else{
            return ['message'=>'Success !','status_code'=>200 , 'data' => $data];
        }

    }//end of method

    public function delete(Request $request){
        $data['is_deleted'] = 1;
        $formdata['deleted_by'] = Auth::user()->id;
        $row = Product::where('id',$request->id)->update($data);

        if(empty($row)){
            return ['message'=>"Can't Delete!",'status_code'=>201];
        }else{
            return ['message'=>'Deleted !','status_code'=>200];
        }
    }//end of method


    public function price_calc(Request $request){

        $comm = array();
        $data = Product::join('product_variants','product_variants.prod_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->where('products.id',$request->id)->groupBy('product_variants.prod_id')->first(['products.price','products.cat_id','categories.commision',DB::raw('GROUP_CONCAT(product_variants.price) as price'),DB::raw('GROUP_CONCAT(product_variants.variant) as variant')]);
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
        $row = Product::where('id',$request->id)->update($data);

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

    public function getSearch(request $request) 
    {
        $search = $request->search;
        // print_r($search);
        // die;
        // $status= SubCategory::where(['is_deleted'=>0,'active_status'=>1])->whereRaw('name = '.$search.'')->get(['id','name']);
        $data = Product::query();
            $data = $data->join('product_variants','product_variants.prod_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id');

            $data = $data->whereRaw('(products.name LIKE "%'.$search.'%")');
           
            $data = $data->where(['products.active_status'=>1,'products.is_deleted'=>0])->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat','product_variants.variant' ,'product_variants.color','product_variants.price','product_variants.id as varientID']);
        return $data;
    }

    // public function import_product(Request $request){

    //     $insert = Excel::import(new ProductImport,$request->file('excel'));

    //     if(empty($insert)){

    //         return response()->json(['status'=>3]);

    //     }else{

    //       return response()->json(['status'=>1]);
    //     }

    // }//End if Function

    public function import_product(Request $request){

        $file = fopen($request->file('excel'),'r');
        
        while(!feof($file)) {
            $row  = fgetcsv($file);

            $last_id = '';
             if(empty($row[0])){
                return ['message'=>"Can't Update Status!",'status'=>1];
            }

            $formdata['name'] = $row[0];
            $formdata['brand_id'] = $row[1];
            $formdata['cat_id'] = $row[2];
            $formdata['sub_cat_id'] = $row[3];
            $formdata['tax_id'] = $row[4];
            $formdata['mrp'] = $row[5];
            $formdata['price'] = $row[6];
            $formdata['sale'] = $row[7];
            $formdata['is_return'] = $row[8];
            $formdata['best_selling'] = $row[9];
            $formdata['coupon_valid'] = $row[10];
            $formdata['self_shipping'] = $row[11];
            $formdata['description'] = $row[19];
            $formdata['description2'] = $row[20];
            $formdata['added_by'] = Auth::user()->id;
  
        if (!empty($row[12])) {
            // $formdata['image'] = url('storage').'/'.$row[0]; 
            // $last_id = Product::insertGetId($formdata);
            // $filedata['path'] = url('storage').'/'.$row[0]; 
            // $filedata['added_by'] = Auth::user()->id;
            // $filedata['prd_id'] = $last_id; 
            // ProductImage::insertGetId($filedata);
            // Storage::disk('public')->put('upload'.$row[0].'.jpg', file_get_contents($row[12]));
            $formdata['image'] =$row[12]; 
            $last_id = Product::insertGetId($formdata);
            $filedata['path'] = $row[12]; 
            $filedata['added_by'] = Auth::user()->id;
            $filedata['prd_id'] = $last_id; 
            ProductImage::insertGetId($filedata);
            // Storage::disk('public')->put('upload'.$row[0].'.jpg', file_get_contents($row[12]));
        }
        $variantData['variant'] = $row[13].'g';
        $variantData['qty'] = $row[18];
        $variantData['mrp'] = $row[5];
        $variantData['price'] = $row[6];
        $variantData['length'] = $row[14];
        $variantData['breath'] = $row[15];
        $variantData['height'] = $row[16];
        $variantData['weight'] = $row[17];
        $variantData['added_by'] = Auth::user()->id;
        $variantData['prod_id'] = $last_id; 
        $last_ids = ProductVariant::insertGetId($variantData);



            
        }   // end of while
            
    }   // end of function
}
