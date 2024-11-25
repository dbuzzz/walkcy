<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Taxation,Brand,Product,ProductImage,ProductVariant,VendorCommision};
use Validator;
use Yajra\DataTables\DataTables;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index(request $request)
    {
        if ($request->product) {
          $data['product'] = Product::join('product_images','product_images.prd_id','=','products.id')->where('products.id',$request->product)->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id',DB::raw('GROUP_CONCAT(path) as path')]);
          $data['variant'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1,'prod_id'=>$request->product])->get();
      }
      $data['cat'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['tax'] = Taxation::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('admin.dashboard',$data);
    }//end of method

    public function profile(request $request)
    {
       $data = User::query();
       if ($request->id) {
        $data = $data->where('users.id',$request->id);
       }else{
        $data = $data->where('users.id',Auth::user()->id);
       }
       $data = $data->leftjoin('vendor_commisions','users.id','=','vendor_commisions.user_id')->leftjoin('roles','roles.id','=','users.user_type')->leftjoin('categories','categories.id','=','vendor_commisions.cat_id')->groupBy('vendor_commisions.user_id')->first(['users.mobile','users.email','users.name','users.extra_info','users.extra_file','roles.name as role',DB::raw('GROUP_CONCAT(vendor_commisions.commision) as vendor_commision'),DB::raw('GROUP_CONCAT(categories.name) as category')]);

       $data['data'] = $data;
      $data['vendor_commision'] = !empty($data['data']->vendor_commision)?explode(',', $data['data']->vendor_commision):'';
      $data['category'] = !empty($data['data']->category)?explode(',', $data['data']->category):'';
      $data['extra_info'] = !empty($data['data']->extra_info)?json_decode($data['data']->extra_info,true):'';
      $data['extra_file'] = !empty($data['data']->extra_file)?json_decode($data['data']->extra_file,true):'';
      return view('admin.profile',$data);
    }//end of method

    public function basic_email($email = '',$token = '') {
      $data['data'] = array('name'=>"Ayusharogyam",'token'=>$token);
   
     $ms =  Mail::send('admin.mail', $data, function($message) {
         $message->to('harshsrivastava261@gmail.com', 'Tutorials Point')->subject
            ('Profile Verification Mail');
         $message->from('xyz@gmail.com','Ayusharogyam');
      });
      dd($ms);
      return true;
   }
}
