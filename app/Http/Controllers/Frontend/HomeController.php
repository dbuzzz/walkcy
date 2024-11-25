<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Brand,Category,SubCategory,Product,Contact,HomePage,NewsLetter,ContactUsPage,GenralPage,Address,User,EclinicPage,DoctorCategory,DoctorInfo,DoctorReview,Coupon,CouponUsed,ProductVariant,Blog,BlogCategory,Wishlist,Order,OrderDetail,HomeBanner,BrandPartner,Testimonial,Taxation};
use Validator;
use Auth;
use Str;
use Schema;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Seshac\Shiprocket\Shiprocket;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;
use GuzzleHttp\Client;
use Share;
use Ixudra\Curl\Facades\Curl;


class HomeController extends Controller
{
   
    public function index()
    {
        // dd(\Cart::getcontent());
      $data['title'] = 'Home';
      $data['home_category'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();

      $data['BrandPartner'] = BrandPartner::where(['is_deleted'=>0,'active_status'=>1])->get();
      
      $data['Testimonial'] = Testimonial::where(['is_deleted'=>0,'active_status'=>1])->get();

      $data['home_page'] = HomePage::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['HomeBanner'] = HomeBanner::join('categories','categories.id','=','home_banners.cat_id1')->join('categories as cat2','cat2.id','=','home_banners.cat_id2')->join('categories as cat3','cat3.id','=','home_banners.cat_id3')->join('categories as cat4','cat4.id','=','home_banners.cat_id4')->where(['home_banners.is_deleted'=>0,'categories.is_deleted'=>0])->orderBy('home_banners.id','DESC')->first(['home_banners.id','home_banners.active_status','home_banners.banner1','home_banners.banner2','home_banners.banner3','home_banners.banner4','categories.name as cat1','cat2.name as cat2','cat3.name as cat3','cat4.name as cat4','home_banners.cat_id1','home_banners.cat_id2','home_banners.cat_id3']);
      $data['best_selling_prod'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['best_selling'=>1,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->limit(8)->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

    //   $data['blog'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->orderBy('blogs.id','DESC')->get(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

      $data['sale_prod'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['sale'=>1,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->limit(8)->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      $data['new_prod'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->limit(8)->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      return view('frontend.home',$data);
    }//end of method

    public function getmenu()
    {
      $resp = array();
      $data['brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['category'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['sub_cat'] = SubCategory::where(['is_deleted'=>0,'active_status'=>1])->orderBy('id','DESC')->limit(5)->get();
      foreach ($data['category'] as $key => $value) {
        $cat['cat'][$key] = $value->name;
        $resp[$key]['cat_name']= $value->name;
        $resp[$key]['cat_id']= $value->id;
        $resp[$key]['sub_cat']= SubCategory::where(['is_deleted'=>0,'active_status'=>1,'cat_id'=>$value->id])->get()->toArray();
      }
      $data['menu_cat'] = $resp;
      $data['genral_page'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      return $data;
    }//end of method


    public function product_list(Request $request)
    {
        $data['selectedCategory'] = explode(',',$request->addCategory);
        $data['selectedBrand'] = explode(',',$request->addBrand);
        $data['selectedColor'] = explode(',',$request->addColor);
        $data['selectedPrice'] = explode(',',$request->addPrice);
        $data['selectedVariant'] = explode(',',$request->addVariant);
        // dd($data);
        $per_page = 10;
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'ProductList';
      $data['home_category'] = Category::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_sub_category'] = SubCategory::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_brand'] = Brand::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['color'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1])->groupBy('color')->get();
      $data['size'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1])->groupBy('variant')->get();
      $datas = Product::query();
            $datas = $datas->join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1]);
      if ($request->cat_id) {
            $datas = $datas->where(['products.cat_id'=>$request->cat_id]);
            $data['b_image'] = Category::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->cat_id])->first();
      }else if(!empty($request->sub_cat_id)){
            $datas = $datas->where(['products.sub_cat_id'=>$request->sub_cat_id]);
            $data['b_image'] = SubCategory::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->sub_cat_id])->first();
      }else if(!empty($request->brand)){
            $datas = $datas->where(['products.brand_id'=>$request->brand]);
            $data['b_image'] = Brand::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->brand])->first();
      }
       if(@$request->page){
            $datas = $datas->limit($per_page);
            $offset = ($request->page * $per_page) - $per_page;
            $datas = $datas->offset($offset);
        }else{
            $datas = $datas->limit($per_page);
        }

      if(!empty($request->search)){
            $datas = $datas->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      }
      // if(!empty($request->page)){
      //       // $count = $count->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      // }else{
      //       $data = $data->limit(1)->offset(1);
      // }

      $datas = $datas->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);


      // for count

      $count = Product::query();
            $count = $count->join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1]);
      if ($request->cat_id) {
            $count = $count->where(['products.cat_id'=>$request->cat_id]);
      }else if(!empty($request->sub_cat_id)){
            $count = $count->where(['products.sub_cat_id'=>$request->sub_cat_id]);
      }else if(!empty($request->brand)){
            $count = $count->where(['products.brand_id'=>$request->brand]);
      }


      if(!empty($request->search)){
            $count = $count->whereRaw('(products.name LIKE "%'.$request->search.'%" or products.description LIKE "%'.$request->search.'%")');
      }


      $count = $count->groupBy('product_images.prd_id')->orderBy('products.id','DESC')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      // dd(count($count));
      $data['product_list'] = $datas;
      $data['count'] = count($count);
      return view('frontend.product_list',$data);
    }//end of method

    public function contact(Request $request)
    {
      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'Contact-US';
      return view('frontend.contact_us',$data);
    }//end of method

    public function storeLocation(Request $request)
    {
      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'storeLocation';
      return view('frontend.storeLocation',$data);
    }//end of method

    public function about(Request $request)
    {
      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'about-US';
      return view('frontend.about-us',$data);
    }//end of method

    public function siteMap(Request $request)
    {
      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'siteMap';
      return view('frontend.siteMap',$data);
    }//end of method

    public function e_clinic(Request $request)
    {
      $data['home_page'] = EclinicPage::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['home_category'] = DoctorCategory::where(['is_deleted'=>0,'active_status'=>1])->get();
      $data['datacontact'] = ContactUsPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'E-Clinic';
      return view('frontend.e_clinic',$data);
    }//end of method

    public function privacyPolicy(Request $request)
    {
      $data['title'] = 'privacyPolicy';
      $data['doctor'] = array();
      return view('frontend.privacyPolicy',$data);
    }//end of method

    public function termsCondition(Request $request)
    {
      $data['title'] = 'Terms & Conditions';
      $data['doctor'] = array();
      return view('frontend.termsCondition',$data);
    }//end of method
    public function refundReturn(Request $request)
    {
      $data['title'] = 'Refund & Return';
      $data['doctor'] = array();
      return view('frontend.refundReturn',$data);
    }//end of method
    public function shippingPolicy(Request $request)
    {
      $data['title'] = 'Shipping Policy';
      $data['doctor'] = array();
      return view('frontend.shippingPolicy',$data);
    }//end of method

    public function doctor_list(Request $request)
    {
      $data['title'] = 'Doctor-List';
      $data['doctor'] = DoctorInfo::where(['is_deleted'=>0,'active_status'=>1])->get();
      return view('frontend.doctorlist',$data);
    }//end of method

    public function doctor_detail(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'DoctorDetail';
      $data['doctor'] = DoctorInfo::where(['is_deleted'=>0,'active_status'=>1,'id'=>$request->doctor])->first();

      $data['review'] = DoctorReview::join('users','doctor_reviews.user_id','=','users.id')->where(['users.is_deleted'=>0,'product_id'=>$request->doctor])->get(['doctor_reviews.review','doctor_reviews.created_at','users.name',]);
      // $data['related_product'] = Product::where(['is_deleted'=>0,'active_status'=>1,'cat_id'=>$data['product']->cat_id])->get();

      // $data['related_product'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.cat_id'=>$data['product']->cat_id,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);
      return view('frontend.doctor_detail',$data);
    }//end of method

    public function cart_page(Request $request)
    {
        // \Cart::clear();
        if (count(\Cart::getcontent()) == 0) {
            return redirect('/dashboard');
        }
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
        $data['taxation'] = Taxation::orderBy('id','DESC')->get();
      $data['title'] = 'Cart';
      return view('frontend.cart',$data);
    }//end of method

    public function wishlist(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'Wishlist';
      $data['wishlist'] =Wishlist::join('products','products.id','=','wishlists.prod_id')->where(['wishlists.user_id'=>Auth::user()->id,'products.is_deleted'=>0,'products.active_status'=>1])->get(['products.id','products.name','products.image','products.price']);
      // dd($data['wishlist']);
      return view('frontend.wishlist',$data);
    }//end of method

    public function user_profile(Request $request)
    {
        $data['add'] = User::leftjoin('addresses','addresses.user_id','=','users.id')->where(['users.is_deleted'=>0,'users.id'=>Auth::user()->id])->first(['users.name','users.email','users.mobile','addresses.country','addresses.state','addresses.city','addresses.pincode','addresses.address','addresses.id']);
        $data['order'] = Order::where(['is_deleted'=>0,'active_status'=>0,'is_payment'=>1,'user_id'=>Auth::user()->id])->orderBy('id','DESC')->get();
      $data['title'] = 'profile';
      return view('frontend.user_profile',$data);
    }//end of method

   
    public function order_detail(Request $request)
    {

        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.id as o_id','order_details.shiprocket_shipment_id','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);
        foreach ($data['order_details'] as $key => $value) {
            $token =  Shiprocket::getToken();
            $shipmentId = $value->shiprocket_shipment_id;
            $response =  Shiprocket::track($token)->throwShipmentId($shipmentId);
            if ($response['tracking_data']['track_status']) {
                OrderDetail::where('id',$value->o_id)->update(['order_status'=>$response['tracking_data']['shipment_track'][0]['current_status']]);
            }
        }
        
      $data['title'] = 'order_detail';
      return view('frontend.order_detail',$data);
    }//end of method

    public function checkout_page(Request $request)
    {
        
        if (count(\Cart::getcontent()) ==0) {
            return redirect('/');
        }
        $price =0;
        $coupon_discount_amount = 0;
            if ($request->coupon) {
                $coupon = Coupon::where('code',$request->coupon)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
                if (!empty($coupon->usage)) {
                    $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                    if ($usage[0]->count>=$coupon->usage) {
                        // return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                    }
                }
                
                
                if ($coupon) {
                    if (\Cart::getcontent()) {
                    foreach(\Cart::getcontent() as $key=>$value){
                        if ($value->attributes['coupon_valid']) {
                            $price+=$value->price*$value->quantity;
                        }

                    }

                    if($price And $price>=$coupon->order_amount){
                        if ($coupon->type == 1) {
                            $coupon_discount_amount = ($coupon->value / 100) * $price;
                        }else{
                            $coupon_discount_amount =$coupon->value;
                        }
                        // return response()->json(['status_code'=>200,'message'=> 'Coupon Applied','amount'=>$amount]);  
                    }
                }
                }
            }
            
            // Coupon Calculation

            // TAx Calculation
            $tax = 0;
            $shipping = 0;
            $data['cart'] = $cart = \Cart::getcontent();
            // $ad= Address::where(['user_id'=>Auth::user()->id])->orderBy('id','DESC')->first(['pincode']);

            if(count($cart) !=0)
            {
                foreach($cart as $key=>$value){
                    if (!$request->coupon) {
                    $price +=(int)$value->price*(int)$value->quantity;
                }
                
                if (!empty($ad)) {
                    $prd = Product::join('users','users.id','=','products.added_by')->where(['products.id'=>$value->id])->first(['users.pincode']);
                    $token =  Shiprocket::getToken();
                    $pincodeDetails = [
                        'pickup_postcode' => $prd->pincode,
                        'delivery_postcode' => $ad->pincode,
                        'weight' => $value->attributes['weight'],
                        'cod' => '0'
                
                    ];
                    $response =  Shiprocket::courier($token)->checkServiceability($pincodeDetails);
                    $shipping += $response['data']['available_courier_companies'][0]['rate'];
                }
                    $tax += ($value->attributes['tax'] / 100) * $value->price;

                }
            }

      $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
    //   $data['address'] = Address::where(['active_status'=>1,'user_id'=>Auth::user()->id,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'checkout';
      $data['coupon_discount_amount'] = $coupon_discount_amount;
      $data['shipping'] = $shipping;
      $data['price'] = $price;
      $data['tax'] = $tax;
      $data['total'] = ($tax+$price+$shipping)-$coupon_discount_amount;
      return view('frontend.checkout',$data);
    }//end of method

    public function user_login(Request $request)
    {
      $data['title'] = 'Login';
      if(Auth::user()){
        if (Auth::user()->user_type == 4) {
            return Redirect::to(url()->previous());
        }
        }
      return view('frontend.login',$data);
    }//end of method

    public function user_opt_verify($id)
    {
      $data['title'] = 'OTP Verification';
      $data['id'] = $id;
      
      return view('frontend.otpverify',$data);
    }//end of method

    public function forget_password(Request $request)
    {
      $data['title'] = 'Forget Password';
      if(Auth::user()){
        if (Auth::user()->user_type == 4) {
            return Redirect::to(url()->previous());
        }
        }
      return view('frontend.forget_password',$data);
    }//end of method

    // public function password_reset(Request $request)
    // {
    //   $data['title'] = 'Reset Password';
    //   if(Auth::user()){
    //     if (Auth::user()->user_type == 4) {
    //         return Redirect::to(url()->previous());
    //     }
    //     }
    //   return view('frontend.password_reset',$data);
    // }//end of method

    public function reset_password(Request $request)
    {
      $data['title'] = 'Reset Password';
      if(Auth::user()){
        if (Auth::user()->user_type == 4) {
            return Redirect::to(url()->previous());
        }
        }
      return view('frontend.reset_password',$data);
    }//end of method

    public function user_register(Request $request)
    {
      $data['title'] = 'register';
      return view('frontend.register',$data);
    }//end of method

    public function product_detail(Request $request)
    {
        $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
      $data['title'] = 'ProductDetail';
      $data['product'] =  Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where('products.id',$request->product)->where(['products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->first(['products.name','products.id','products.description','products.description2','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.coupon_valid','products.self_shipping','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);

      $data['variant'] = ProductVariant::where(['is_deleted'=>0,'active_status'=>1,'prod_id'=>$request->product])->get(); 
      $data['review'] = DoctorReview::join('users','users.id','=','doctor_reviews.user_id')->where(['doctor_reviews.is_deleted'=>0,'doctor_reviews.active_status'=>1,'doctor_reviews.product_id'=>$request->product])->get(['doctor_reviews.review','doctor_reviews.rating','doctor_reviews.image','doctor_reviews.created_at','users.name',]); 

      $data['share'] = Share::page(route('product_detail',['product'=>$request->product]), $data['product']->name)
    ->facebook()
    ->twitter()
    ->linkedin('Extra linkedin summary can be passed here')
    ->whatsapp()->getRawLinks();

      $data['related_product'] = Product::join('product_images','product_images.prd_id','=','products.id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('brands','brands.id','=','products.brand_id')->join('users','users.id','=','products.added_by')->where(['products.cat_id'=>$data['product']->cat_id,'products.is_deleted'=>0,'products.active_status'=>1,'users.is_deleted'=>0,'users.active_status'=>1,'categories.is_deleted'=>0,'categories.active_status'=>1,'sub_categories.is_deleted'=>0,'sub_categories.active_status'=>1,'brands.is_deleted'=>0,'brands.active_status'=>1])->groupBy('product_images.prd_id')->get(['products.name','products.id','products.description','products.tag','products.image','products.active_status','products.qty','products.mrp','products.price','products.stock_warning','products.is_return','products.best_selling','products.sale','products.brand_id','products.sub_cat_id','products.cat_id','products.tax_id','brands.name as brand','categories.name as category','sub_categories.name as sub_category',DB::raw('GROUP_CONCAT(path) as path')]);
      return view('frontend.product_detail',$data);
    }//end of method

    public function blog(Request $request)
        {
            $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
          $data['title'] = 'Blog';

          $data['blog'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->orderBy('blogs.id','DESC')->get(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

          return view('frontend.blog',$data);
        }//end of method

        public function blog_detail(Request $request)
        {
            $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
          $data['title'] = 'Blog Detail';
          $data['blog'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.id'=>$request->id,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->first(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

          $data['blogs'] = Blog::join('blog_categories','blog_categories.id','=','blogs.cat_id')->where(['blogs.is_deleted'=>0,'blogs.active_status'=>1,'blog_categories.is_deleted'=>0,'blog_categories.active_status'=>1])->orderBy('blogs.id','DESC')->get(['blogs.name','blogs.id','blogs.description','blog_categories.name as cat','blogs.image','blogs.created_at']);

          return view('frontend.blog_detail',$data);
        }//end of method

    public function add_wishlist(Request $request){
        $wishlist = Wishlist::where(['prod_id'=>$request->id,'user_id'=>Auth::user()->id])->first();
        if ($wishlist) {
            return response()->json(['status' => 4]);
        }
        $formdata['prod_id'] = $request->id;
            $formdata['user_id'] = Auth::user()->id;
            $formdata['added_by'] = Auth::user()->id;
            $row = Wishlist::insertGetId($formdata);
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($row){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function remove_wishlist(Request $request){
        $wishlist = Wishlist::where(['prod_id'=>$request->id,'user_id'=>Auth::user()->id])->delete();
       
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($wishlist){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function count_wishlist(Request $request){
       
            $count = Wishlist::where(['user_id'=>Auth::user()->id])->get();


            if($count){

                    return response()->json(['status'=>1,'count'=>count($count)]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }
    public function cart(Request $request){

                $id = $request->post('id');//for edit functionality
                $prod = Product::query();
                if ($request->variant_id) {
                    $prod = $prod->where('product_variants.id',$request->variant_id);
                }
                if ($request->id) {
                    $prod = $prod->where('products.id',$request->id);
                }
                $prod = $prod->join('product_variants','product_variants.prod_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id')->first(['products.id','products.name','products.coupon_valid','products.image','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat','product_variants.variant' ,'product_variants.color','product_variants.price','product_variants.id as varientID']);
               $s =  \Cart::add([
                'name' => $prod->name,
                'id' => $prod->id,
                'price' => $prod->price,
                'quantity' => 1,
                'attributes' => array(
                'coupon_valid' => $prod->coupon_valid,
                'variant' => $prod->variant,
                'taxApplicable' => 1,
                'prod_id' => $prod->id,
                'length' => $prod->length,
                'breath' => $prod->breath,
                'height' => $prod->height,
                'weight' => $prod->weight,
                // 'tax' => $prod->value,
                'tax' => 0,
                'image' => $prod->image,
                'cat' => $prod->cat,
                'sub_cat' => $prod->sub_cat,
                'color' => $prod->color,
                'showGST' => 1,
                )
            ]);
            // \Cart::remove(4);
               $cart = \Cart::getcontent();

               $count = count(\Cart::getcontent());

                if($cart){

                        return response()->json(['status'=>1,'count'=>$count,'cart'=>$cart]);  
                }else{
                    
                        return response()->json(['status' => 3]);
                }
        }

    public function couponcheck(Request $request){
        if ($request->code) {
            $coupon = Coupon::where('code',$request->code)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
            if (!empty($coupon->usage)) {
                $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                if ($usage[0]->count>=$coupon->usage) {
                    return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                }
            }
            $price =0;
            if ($coupon) {
                if (\Cart::getcontent()) {
                foreach(\Cart::getcontent() as $key=>$value){
                    if ($value->attributes['coupon_valid']) {
                        $price+=$value->price*$value->quantity;
                    }

                }

                if($price And $price>=$coupon->order_amount){
                    if ($coupon->type == 1) {
                        $amount = ($coupon->value / 100) * $price;
                    }else{
                        $amount = $coupon->value;
                    }
                    if ($coupon->max_discount < $amount) {
                        $amount = $coupon->max_discount;
                    }
                    return response()->json(['status_code'=>200,'message'=> 'Coupon Applied','amount'=>$amount]);  
                }else{
                    return response()->json(['status_code' => 201,'message'=> 'Mininmum Order Amount is '.$coupon->order_amount.'']);
                }
            }
            }else{
           return response()->json(['status_code' => 201,'message'=> 'Please Enter Valid Coupon Code']);
        }

        }else{
           return response()->json(['status_code' => 201,'message'=> 'Please Enter Coupon Code']);
        }
    }

    public function remove_cart(Request $request)
    {
        $cart = \Cart::remove($request->id);
        $count = count(\Cart::getcontent());
        if($cart){

                    return response()->json(['status'=>1,'count'=>$count]);   
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function updateCart(Request $request)
    {
       $cart = \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );

        if($cart){

                    return response()->json(['status'=>1]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }


    }
    
    public function updateCartAmount(Request $request)
    {
       $cart = \Cart::update(
            $request->id,
            [
                // 'price' => [
                //     'relative' => false,
                //     'value' => $request->qty
                // ],
                'price' =>$request->qty
            ]
        );

        if($cart){

                    return response()->json(['status'=>1]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }


    }
    public function updateCartTax(Request $request)
    {
            $cart = \Cart::remove($request->id);

            $prod = Product::query();
                if ($request->id) {
                    $prod = $prod->where('product_variants.id',$request->id);
                }
                $prod = $prod->join('product_variants','product_variants.prod_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id')->first(['products.id','products.name','products.coupon_valid','products.image','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat','product_variants.variant' ,'product_variants.color','product_variants.price','product_variants.id as varientID']);
               $s =  \Cart::add([
                'id' => $prod->varientID,
                'name' => $prod->name,
                'price' => $prod->price,
                'quantity' => 1,
                'attributes' => array(
                'coupon_valid' => $prod->coupon_valid,
                'variant' => $prod->variant,
                'taxApplicable' => 1,
                'prod_id' => $prod->id,
                'length' => $prod->length,
                'breath' => $prod->breath,
                'height' => $prod->height,
                'weight' => $prod->weight,
                'tax' => $request->qty,
                'image' => $prod->image,
                'cat' => $prod->cat,
                'sub_cat' => $prod->sub_cat,
                'color' => $prod->color,
                )
            ]);

        if($s){

                    return response()->json(['status'=>1]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }


    }
    public function updateCartRemoveTax(Request $request)
    {
            foreach (\Cart::getcontent() as $key => $value) {
                $cart = \Cart::remove($value->id);

                $prod = Product::query();
                    if ($value->id) {
                        $prod = $prod->where('product_variants.id',$value->id);
                    }
                    $prod = $prod->join('product_variants','product_variants.prod_id','=','products.id')->join('brands','brands.id','=','products.brand_id')->join('categories','categories.id','=','products.cat_id')->join('sub_categories','sub_categories.id','=','products.sub_cat_id')->join('taxations','taxations.id','=','products.tax_id')->first(['products.id','products.name','products.coupon_valid','products.image','taxations.name as tax','taxations.value','brands.name as brand','categories.name as cat','sub_categories.name as sub_cat','product_variants.variant' ,'product_variants.color','product_variants.price','product_variants.id as varientID']);
                $s =  \Cart::add([
                    'id' => $prod->varientID,
                    'name' => $prod->name,
                    'price' => $prod->price,
                    'quantity' => 1,
                    'attributes' => array(
                    'coupon_valid' => $prod->coupon_valid,
                    'variant' => $prod->variant,
                    'taxApplicable' => 0,
                    'prod_id' => $prod->id,
                    'length' => $prod->length,
                    'breath' => $prod->breath,
                    'height' => $prod->height,
                    'weight' => $prod->weight,
                    'tax' => 0,
                    'image' => $prod->image,
                    'cat' => $prod->cat,
                    'sub_cat' => $prod->sub_cat,
                    'color' => $prod->color,
                    'showGST' => $request->GSTs,
                    )
                ]);
            }
            

        if($s){

                    return response()->json(['status'=>1]);  
            }else{
                
                    return response()->json(['status' => 3]);
            }


    }

    public function count_cart(Request $request)
    {
        $count = count(\Cart::getcontent());
        if($count){

                    return response()->json(['status'=>1,'count'=>$count]);   
            }else{
                
                    return response()->json(['status' => 3]);
            }
    }

    public function cart_item(Request $request)
        {
            $cart_item =\Cart::getcontent();
            if($cart_item){

                        return response()->json(['status'=>1,'cart_item'=>$cart_item]);   
                }else{
                    
                        return response()->json(['status' => 3]);
                }
        }

    public function save_contact(Request $request){
           $validator = Validator::make($request->all(),[
                'name'=>'required|regex:/^[a-zA-Z ]+$/',
                'email'=>'required',
                'subject'=>'required',
                'message'=>'required',
                'phone' => 'required|numeric|digits:10|regex:/^[6-9]{1}[0-9]{9}$/|min:10', 
            ]);
        if($validator->passes()) {
            $formdata['name'] = $request->name;
            $formdata['email'] = $request->email;
            $formdata['subject'] = $request->subject;
            $formdata['message'] = $request->message;
            $formdata['phone'] = $request->phone;
            $row = Contact::insertGetId($formdata);
            $msg = 'Message Placed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function save_newsletter(Request $request){
            $validator = Validator::make($request->all(),[
                'email'=>'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:news_letters',
            ]);
        if($validator->passes()) {
            $formdata['email'] = $request->email;
            $row = NewsLetter::insertGetId($formdata);
            $msg = 'Subscribed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method


    public function save_review(Request $request){
            $validator = Validator::make($request->all(),[
                'review'=>'required',
                'rating'=>'required'
            ]);
            // print_r($request->all());
            // die;
        if($validator->passes()) {
            $formdata['review'] = $request->review;
            $formdata['rating'] = $request->rating;
            // $formdata['image'] = $request->review;
            if(!empty($request->file('image')) ){
                foreach ($request->file('image') as $key => $value) {
                    $img = $value;
                    $filedata[$key] = url('uploads').'/'.time().'-'.$img->getClientOriginalName(); 
                    $img->move(public_path('uploads'), $filedata[$key]);
                }
                $formdata['image'] = implode(',',$filedata);
            }
            $formdata['product_id'] = $request->product_id;
            $formdata['user_id'] = Auth::user()->id;
            $row = DoctorReview::insertGetId($formdata);
            $msg = 'Subscribed';
                 if($row){
                    return ['status_code' => 200 , 'message' =>$msg];
                }else{
                    return ['status_code' => 201 , 'message' => "Something went wrong !"];
                }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method

    public function payment(Request $request){
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'number'=>'required',
                'city'=>'required',
                'state'=>'required',
                'country'=>'required',
                'pincode'=>'required',
                'address'=>'required',
            ]);
            // print_r($request->all());
            // die;
        if($validator->passes()) {
            // dd($request->city);
            $formdata['user_id'] = Auth::user()->id;
            $formdata['name'] = $request->name;
            // $formdata['email'] = $request->email;
            $formdata['mobile'] = $request->number;
            $formdata['address'] = $request->address;
            // $formdata['country'] = $request->country;
            $formdata['city'] = $request->city;
            // $formdata['state'] = $request->state;
            // $formdata['pincode'] = $request->pincode;
            // $formdata['tax'] = $request->tax;
            // $formdata['shipping'] = $request->shipping;
            $formdata['discount'] = $request->discount;
            // $formdata['total'] = $request->total;
            $formdata['active_status'] =1;
            $formdata['is_payment'] =1;
            $row = Order::insertGetId($formdata);

            // $lastid = OrderDetail::insertGetId($formdata);
            // Coupon
            $coupon_discount_amount = '';
            $coupon = '';
            if ($request->coupon) {
                $coupon = Coupon::where('code',$request->coupon)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
                if (!empty($coupon->usage)) {
                    $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                    if ($usage[0]->count>=$coupon->usage) {
                        // return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                    }
                }}
                $price =0;
                
                    if (\Cart::getcontent()) {
                    foreach(\Cart::getcontent() as $key=>$value){


                        $variantdata['price'] = $price =(int)$value->price*(int)$value->quantity;
                        $variantdata['tax'] = $tax = ($value->attributes['tax'] / 100) * $price;
                        $variantdata['coupon_id'] =  $value->attributes['showGST'];
                        if ($coupon) {
                        if ($value->attributes['coupon_valid']) {
                            if ($coupon->type == 1) {

                               $variantdata['coupon_discount'] =  $coupon_discount_amount = ($coupon->value / 100) * $price;
                               
                            }
                            
                        }
                    }
                        $variantdata['variant_id'] = $value->id;
                        $variantdata['variation'] = $value->attributes['variant'];
                        $variantdata['length'] = $value->attributes['length'];
                        $variantdata['breath'] = $value->attributes['breath'];
                        $variantdata['height'] = $value->attributes['height'];
                        $variantdata['weight'] = $value->attributes['weight'];
                        $variantdata['prod_id'] = $value->attributes['prod_id'];
                        $variantdata['quantity'] = $value->quantity;
                        $variantdata['order_id'] = $row;
                        $variantdata['added_by'] = Auth::user()->id;
                        $lastid = OrderDetail::insertGetId($variantdata);

                    }

                }
                if (!empty($coupon)) {
                    $couponData['added_by'] = Auth::user()->id;
                    $couponData['user_id'] = Auth::user()->id;
                    $couponData['coupon_id'] = $coupon->id;
                    CouponUsed::insertGetId($couponData);
                }
                
           

        //     $parameters = [
        //     // 'tid' => '1',
        //     'order_id' => $row,
        //     'amount' => $request->total,
        //     'billing_full_name'=> $request->name,
        //     'billing_email' => $request->email,
        //     'billing_contact_number' => $request->mobile,
        //     'billing_address' => $request->review,
        //     'billing_city' => $request->review,
        //     'billing_state' => $request->review,
        //     'billing_country' => $request->review,
        // ];
        // $this->r_payment($parameters);
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // $order  = $api->order->create(array('receipt' =>$row, 'amount' => $request->total * 100 , 'currency' => 'INR')); // Creates order
        // Order::where('id',$row)->update(['orders_id'=>$order['id']]);
        $datas = array(
            'o' => $row,
            'a' => $request->total,
            'e' => $request->email,
            'm' => $request->number
        );
        // dd(route('BillPrint',['id'=>$row]));
        return Redirect(route('BillPrint',['id'=>$row]));


        // $this->r_payment($datas);
      
                //  if($row){
                //     return ['status_code' => 200 , 'message' =>$msg];
                // }else{
                //     return ['status_code' => 201 , 'message' => "Something went wrong !"];
                // }
            }
           
        return ['message'=>$validator->errors()->all(),'status_code'=>301];      
    }//end of method
    public function genrateInvoice(Request $request){
        if (\Cart::getcontent()) {
            if (count(\Cart::getcontent()) ==0) {
                return redirect('/');
            }
            $price =0;
            $coupon_discount_amount = 0;
                if ($request->coupon) {
                    $coupon = Coupon::where('code',$request->coupon)->whereRaw('date(validity_from)<=date("'.date('Y-m-d').'") and date(validity_to)>=date("'.date('Y-m-d').'")')->first();
                    if (!empty($coupon->usage)) {
                        $usage = CouponUsed::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::user()->id])->get(DB::raw('count(id) as count'));
                        if ($usage[0]->count>=$coupon->usage) {
                            // return response()->json(['status_code' => 201,'message'=> 'You Have Reached The limit']);
                        }
                    }
                    
                    
                    if ($coupon) {
                        if (\Cart::getcontent()) {
                        foreach(\Cart::getcontent() as $key=>$value){
                            if ($value->attributes['coupon_valid']) {
                                $price+=$value->price*$value->quantity;
                            }
    
                        }
    
                        if($price And $price>=$coupon->order_amount){
                            if ($coupon->type == 1) {
                                $coupon_discount_amount = ($coupon->value / 100) * $price;
                            }else{
                                $coupon_discount_amount =$coupon->value;
                            }
                            // return response()->json(['status_code'=>200,'message'=> 'Coupon Applied','amount'=>$amount]);  
                        }
                    }
                    }
                }
                
                // Coupon Calculation
    
                // TAx Calculation
                $tax = 0;
                $shipping = 0;
                $data['cart'] = $cart = \Cart::getcontent();
                // $ad= Address::where(['user_id'=>Auth::user()->id])->orderBy('id','DESC')->first(['pincode']);
    
                if(count($cart) !=0)
                {
                    foreach($cart as $key=>$value){
                        if (!$request->coupon) {
                        $price +=(int)$value->price*(int)$value->quantity;
                    }
                    
                    if (!empty($ad)) {
                        $prd = Product::join('users','users.id','=','products.added_by')->where(['products.id'=>$value->id])->first(['users.pincode']);
                        $token =  Shiprocket::getToken();
                        $pincodeDetails = [
                            'pickup_postcode' => $prd->pincode,
                            'delivery_postcode' => $ad->pincode,
                            'weight' => $value->attributes['weight'],
                            'cod' => '0'
                    
                        ];
                        $response =  Shiprocket::courier($token)->checkServiceability($pincodeDetails);
                        $shipping += $response['data']['available_courier_companies'][0]['rate'];
                    }
                        $tax += ($value->attributes['tax'] / 100) * $value->price;
    
                    }
                }
    
          $data['genral_pages'] = GenralPage::where(['active_status'=>1,'is_deleted'=>0])->orderBy('id','DESC')->first();
        //   $data['address'] = Address::where(['active_status'=>1,'user_id'=>Auth::user()->id,'is_deleted'=>0])->orderBy('id','DESC')->first();
          $data['title'] = 'checkout';
          $data['coupon_discount_amount'] = $coupon_discount_amount;
          $data['shipping'] = $shipping;
          $data['price'] = $price;
          $data['tax'] = $tax;
          $data['total'] = ($tax+$price+$shipping)-$coupon_discount_amount;
            return view('frontend.genrateInvoice',$data); 
        }else{
            return Redirect(route('/'));
        }
        
        
     
    }//end of method

    public function BillPrint(Request $request)
    { 

        $data['order'] = Order::join('order_details','order_details.order_id','=','orders.id')->join('products','order_details.prod_id','=','products.id')->where(['orders.is_deleted'=>0,'orders.active_status'=>1,'orders.is_payment'=>1,'orders.id'=>$request->id,'orders.user_id'=>Auth::user()->id])->groupby('order_details.order_id')->orderBy('id','DESC')->first(['orders.id','orders.name','orders.email','orders.mobile','orders.address','orders.country','orders.city','orders.state','orders.address','orders.pincode','orders.tax','orders.discount','orders.total','orders.order_status','orders.created_at','orders.shipping']);
        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$data['order']->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.coupon_id','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);
        \Cart::clear();
        return view('frontend.invoice',$data); 
    }

        public function r_payment($data)
    {        
        // dd($data);
        if(count($data)  && !empty($data['o'])) 
        {
        Order::where('orders_id',$data['o'])->update(['payment_id'=>$data['o'],'is_payment'=>1]);
        $data['order'] = Order::join('order_details','order_details.order_id','=','orders.id')->join('products','order_details.prod_id','=','products.id')->where(['orders.is_deleted'=>0,'orders.active_status'=>1,'orders.is_payment'=>1,'orders.id'=>$data['o'],'orders.user_id'=>Auth::user()->id])->groupby('order_details.order_id')->orderBy('id','DESC')->first(['orders.id','orders.name','orders.email','orders.mobile','orders.address','orders.country','orders.city','orders.state','orders.address','orders.pincode','orders.tax','orders.discount','orders.total','orders.order_status','orders.created_at','orders.shipping']);
        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$data['order']->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);

        // $dat = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$data['order']->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);

        $dat = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$data['order']->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','users.pincode as vendor_pin','users.location_id as vendor_location_id','order_details.variation','order_details.id as order_detail_id','order_details.price','order_details.tax','order_details.created_at','order_details.price','order_details.length','order_details.breath','order_details.height','order_details.weight','order_details.quantity','orders.name as username','orders.pincode as user_pin','orders.country as user_country','orders.address as user_address','orders.city as user_city','orders.state as user_state','orders.email as user_email','orders.mobile as user_mobile']);

        foreach ($dat as $key => $value) {

            // $body = array(
            //     'secret' => 'e136e8df711eb3e9ccea28c6037cfd747aef3a4a',
            //     'account' => '55',
            //     'recipient' => '+91'.$data['order']->mobile,
            //     'type' => 'text',
            //     'message' => 'You Have Received A Order Request of '.$value->quantity.' Units For '.$value->name.'('.$value->variation.')'.' ',
            //     );
            //     $client = new Client();
            //     $res = $client->request('POST', 'https://smsbulk.net/api/send/whatsapp',['form_params' => $body]);


                // $or_data = ["name"=> $value->name.'('.$value->variation.')',
                //         "sku"=> $value->name,
                //         "units"=> $value->quantity,
                //         "selling_price"=> $value->price,];
            //     $orderDetails = [
            //     'order_id'=>$value->order_detail_id,
            //     'order_date'=>date('d-m-Y',strtotime($value->created_at)),
            //     'pickup_location'=>$value->vendor_location_id,
            //     'shipping_is_billing'=>1,
            //     'billing_customer_name'=>$value->username,
            //     'billing_last_name'=>$value->username,
            //     'billing_city'=>$value->user_city,
            //     'billing_pincode'=>$value->user_pin,
            //     'billing_state'=>$value->user_state,
            //     'billing_country'=>$value->user_country,
            //     'billing_email'=>$value->user_email,
            //     'billing_phone'=>$value->user_mobile,
            //     'billing_address'=>$value->user_address,
            //     'order_items'=> array($or_data),
            //     // 'name'=>$value->,
            //     // 'sku'=>$value->,
            //     // 'units'=>$value->,
            //     // 'selling_price'=>$value->,
            //     'payment_method'=>'Prepaid',
            //     'sub_total'=>$value->price,
            //     'length'=>$value->length,
            //     'breadth'=>$value->breath,
            //     'height'=>$value->height,
            //     'weight'=>$value->weight,
            // ];
            // $token =  Shiprocket::getToken();
            // $response =  Shiprocket::order($token)->create($orderDetails);
            OrderDetail::where('id',$value->order_detail_id)->update(['shiprocket_id'=>'2','shiprocket_shipment_id'=>'2','order_status'=>1]);
            // dd($dat,$response,$response['order_id']);
        }
        // $this->send_invoice($dat[0]->user_email,$dat[0]->username,$data);
        // if (Auth::user()->is_whatsapp == 1) {
        //         $body = array(
        //         'secret' => 'e136e8df711eb3e9ccea28c6037cfd747aef3a4a',
        //         'account' => '55',
        //         'recipient' => '+91'.$data['order']->mobile,
        //         'type' => 'text',
        //         'message' => 'Thanks For Choosing Ayusharogyam. Your Order Id Is '.$data['order']->id.'',
        //         );
        //         $client = new Client();
        //         $res = $client->request('POST', 'https://smsbulk.net/api/send/whatsapp',['form_params' => $body]);
        //         // dd($res);
        //     }
        
        
         return view('frontend.invoice',$data);      
        }
        
        // \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        // return redirect()->back();
    }

    public function invoice(Request $request)
    {        
        $data['order'] = Order::join('order_details','order_details.order_id','=','orders.id')->join('products','order_details.prod_id','=','products.id')->where(['orders.is_deleted'=>0,'orders.active_status'=>0,'orders.is_payment'=>1,'orders.id'=>$request->id,'orders.user_id'=>Auth::user()->id])->groupby('order_details.order_id')->orderBy('id','DESC')->first(['orders.id','orders.name','orders.email','orders.mobile','orders.address','orders.country','orders.city','orders.state','orders.address','orders.pincode','orders.tax','orders.discount','orders.total','orders.order_status','orders.created_at']);
        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);
        return view('frontend.invoice',$data);  
    }

    public function get_ship(Request $request){
        $shipping =0;
        if ($request->pincode) {
            $cart = \Cart::getcontent();

            if(count($cart) !=0)
            {
                foreach($cart as $key=>$value){
                   
                    $prd = Product::join('users','users.id','=','products.added_by')->where(['products.id'=>$value->id])->first(['users.pincode']);
                    $token =  Shiprocket::getToken();
                    $pincodeDetails = [
                        'pickup_postcode' => $prd->pincode,
                        'delivery_postcode' => $request->pincode,
                        'weight' => $value->attributes['weight'],
                        'cod' => '0'
                
                    ];
                    $response =  Shiprocket::courier($token)->checkServiceability($pincodeDetails);
                    $shipping += $response['data']['available_courier_companies'][0]['rate'];

                }
            }
            return $shipping;
        }
    }

    public function order_cancel(Request $request){
        
        $data['order_details'] = OrderDetail::join('orders','orders.id','=','order_details.order_id')->join('products','products.id','=','order_details.prod_id')->join('users','users.id','=','products.added_by')->where(['products.is_deleted'=>0,'products.active_status'=>1, 'order_id' =>$request->id, 'orders.user_id' =>Auth::user()->id])->get(['products.name','products.image','users.name as username','order_details.variation','order_details.price','order_details.id as o_id','order_details.shiprocket_id','order_details.tax','order_details.shipping','order_details.coupon_discount','order_details.quantity','order_details.order_status','products.id','orders.tax as all_tax','orders.discount as all_discount','orders.total as all_total']);
        foreach ($data['order_details'] as $key => $value) {
            $token =  Shiprocket::getToken();
            $ids = [$value->shiprocket_id]; 
            $response =  Shiprocket::order($token)->cancel(['ids' => $ids]);
                OrderDetail::where('id',$value->o_id)->update(['order_status'=>'Cancelled']);
        }
        return 1;
    }

    public function faq(Request $request)
    { 
        return view('frontend.faq'); 
    }

    public function makePhonePePayment(Request $request)
    {
        $merchantId = 'PGTESTPAYUAT'; // sandbox or test merchantId
        $apiKey="099eb0cd-02cf-4e2a-8aca-3e6c6aff0399"; // sandbox or test APIKEY
        $redirectUrl = url('/');
        
        // Set transaction details
        $order_id = uniqid(); 
        $name="Tutorials Website";
        $email="info@tutorialswebsite.com";
        $mobile=9999999999;
        $amount = 10; // amount in INR
        $description = 'Payment for Product/Service';
        
        
        $paymentData = array(
            'merchantId' => $merchantId,
            'merchantTransactionId' => "MT7850590068188104", // test transactionID
            "merchantUserId"=>"MUID123",
            'amount' => $amount*100,
            'redirectUrl'=>$redirectUrl,
            'redirectMode'=>"POST",
            'callbackUrl'=>$redirectUrl,
            "merchantOrderId"=>$order_id,
            "mobileNumber"=>$mobile,
            "message"=>$description,
            "email"=>$email,
            "shortName"=>$name,
            "paymentInstrument"=> array(    
                "type"=> "PAY_PAGE",
            )
        );
        
        
        $jsonencode = json_encode($paymentData);
        $payloadMain = base64_encode($jsonencode);
        $salt_index = 1; //key index 1
        $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
        $sha256 = hash("sha256", $payload);
        $final_x_header = $sha256 . '###' . $salt_index;
        $request = json_encode(array('request'=>$payloadMain));
                        
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-VERIFY: " . $final_x_header,
            "accept: application/json"
        ],
        ]);
        
        $response = curl_exec($curl);
        dd($response);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $res = json_decode($response);
        dd($res);
        
        if(isset($res->success) && $res->success=='1'){
            $paymentCode=$res->code;
            $paymentMsg=$res->message;
            $payUrl=$res->data->instrumentResponse->redirectInfo->url;
            
            header('Location:'.$payUrl) ;
        }
        }

    }

    public function phonePeCallback(Request $request)
    {
        $input = $request->all();

        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
        //         ->withHeader('Content-Type:application/json')
        //         ->withHeader('accept:application/json')
        //         ->withHeader('X-VERIFY:'.$finalXHeader)
        //         ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
        //         ->get();

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'accept: application/json',
            'X-VERIFY: '.$finalXHeader,
            'X-MERCHANT-ID: '.$input['transactionId']
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        dd(json_decode($response));
        // flash(translate('Your order has been placed successfully. Please submit payment information from purchase history'))->success();
        // return redirect()->route('order_confirmed');
    }

    public function phonePe()
    {
        $data = array (
            'merchantId' => 'M227VJXAPM513',
            'merchantTransactionId' => uniqid(),
            'merchantUserId' => 'MUID123',
            'amount' => 100,
            'redirectUrl' => route('response'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('response'),
            'mobileNumber' => '9999999999',
            'paymentInstrument' => 
            array (
            'type' => 'PAY_PAGE',
            ),
        );

        $encode = base64_encode(json_encode($data));

        $saltKey = 'ab4a1d42-ccb6-4374-aec0-22f08c76f4e1';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay'.$saltKey;
        $sha256 = hash('sha256',$string);

        $finalXHeader = $sha256.'###'.$saltIndex;

        $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";

        $response = Curl::to($url)
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withData(json_encode(['request' => $encode]))
                ->post();

        $rData = json_decode($response);
        // dd($rData);

        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }

    public function response(Request $request)
    {
        $input = $request->all();

        $saltKey = 'ab4a1d42-ccb6-4374-aec0-22f08c76f4e1';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();

        return redirect(route('/genrateInvoice'));
    }



}
