<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLogin; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\RoleController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\SubCategoryController; 
use App\Http\Controllers\Admin\BrandController; 
use App\Http\Controllers\Admin\VendorController; 
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TaxationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\EclinicController;
use App\Http\Controllers\Admin\GenralPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\DoctorCategoryController;
use App\Http\Controllers\Admin\DoctorInfoController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannnerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BrandPartnerController;

// **************frontend******************* 
use App\Http\Controllers\Frontend\HomeController; 
use App\Http\Controllers\Frontend\CalendarController; 
use App\Http\Controllers\Frontend\UserLoginController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/admin',[AdminLogin::class,'admin_login']);
Route::get('admin',[AdminLogin::class,'admin_login']);
Route::get('SignUp',[AdminLogin::class,'SignUp']);
Route::post('admin_login',[AdminLogin::class,'Adminlogin']);
Route::post('saveSignUp',[AdminLogin::class,'saveSignUp']);
Route::get('verification/{id}',[AdminLogin::class,'verification']);
Route::post('verify',[AdminLogin::class,'verify']);
Route::get('logout',[AdminLogin::class,'logout']);
    Route::get('basic_email',[DashboardController::class,'basic_email']);

    Route::get('dashboard',[DashboardController::class,'index']);
Route::middleware("VendorAuth")->group(function(){
    Route::get('profile',[DashboardController::class,'profile'])->name('profile');

    //product management
    Route::group(['prefix' => 'product-management'], function() {
        Route::get('/', [ProductController::class,'index'])->name('product-management.index');
        Route::get('/viewVariants', [ProductController::class,'viewVariants'])->name('product-management.viewVariants');

        Route::get('/view', [ProductController::class,'view'])->name('product-management.view');
        Route::post('/save', [ProductController::class,'save'])->name('product-management.save');
        Route::get('/show', [ProductController::class,'show'])->name('product-management.show');
        Route::get('/status', [ProductController::class,'status'])->name('product-management.status');

        Route::get('/price_calc', [ProductController::class,'price_calc'])->name('product-management.price_calc');
        Route::get('/delete', [ProductController::class,'delete'])->name('product-management.delete');
        Route::get('/edit', [ProductController::class,'edit'])->name('product-management.edit');
        Route::get('/sub_cat', [ProductController::class,'sub_cat'])->name('product-management.sub_cat');
        Route::get('/getSearch', [ProductController::class,'getSearch'])->name('product-management.getSearch');
        Route::post('/import_product', [ProductController::class,'import_product'])->name('product-management.import_product');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', [OrderController::class,'index'])->name('order.index');
        Route::get('/show', [OrderController::class,'show'])->name('order.show');
        Route::get('/order_detail', [OrderController::class,'order_detail'])->name('order.order_detail');
        Route::get('/order_status', [OrderController::class,'order_status'])->name('order.order_status');
    });
    Route::get('/contact', [OrderController::class,'contact'])->name('contact');
    Route::get('/contactShow', [OrderController::class,'contactShow'])->name('contactShow');
    Route::get('/export', [OrderController::class,'export'])->name('export');


    // ********************admin middle ware starts******************
Route::middleware("AdminLogin")->group(function(){
    // roles
    Route::group(['prefix' => 'role'], function() {
        Route::get('/', [RoleController::class,'index'])->name('role.index');
        Route::post('/save', [RoleController::class,'save'])->name('role.save');
        Route::get('/show', [RoleController::class,'show'])->name('role.show');
        Route::get('/status', [RoleController::class,'status'])->name('role.status');
        Route::get('/delete', [RoleController::class,'delete'])->name('role.delete');
        Route::get('/edit', [RoleController::class,'edit'])->name('role.edit');
    });


    Route::group(['prefix' => 'attribute'], function() {
        Route::get('/', [AttributeController::class,'index'])->name('attribute.index');
        Route::post('/save', [AttributeController::class,'save'])->name('attribute.save');
        Route::get('/show', [AttributeController::class,'show'])->name('attribute.show');
        Route::get('/status', [AttributeController::class,'status'])->name('attribute.status');
        Route::get('/delete', [AttributeController::class,'delete'])->name('attribute.delete');
        Route::get('/edit', [AttributeController::class,'edit'])->name('attribute.edit');
    });

    Route::group(['prefix' => 'form'], function() {
        Route::get('/', [FormController::class,'index'])->name('form.index');
        Route::post('/save', [FormController::class,'save'])->name('form.save');
        Route::get('/show', [FormController::class,'show'])->name('form.show');
        Route::get('/status', [FormController::class,'status'])->name('form.status');
        Route::get('/delete', [FormController::class,'delete'])->name('form.delete');
        Route::get('/edit', [FormController::class,'edit'])->name('form.edit');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::post('/save', [CategoryController::class,'save'])->name('category.save');
        Route::get('/show', [CategoryController::class,'show'])->name('category.show');
        Route::get('/status', [CategoryController::class,'status'])->name('category.status');
        Route::get('/delete', [CategoryController::class,'delete'])->name('category.delete');
        Route::get('/edit', [CategoryController::class,'edit'])->name('category.edit');
    });

    Route::group(['prefix' => 'blog-category'], function() {
        Route::get('/', [BlogCategoryController::class,'index'])->name('blog-category.index');
        Route::post('/save', [BlogCategoryController::class,'save'])->name('blog-category.save');
        Route::get('/show', [BlogCategoryController::class,'show'])->name('blog-category.show');
        Route::get('/status', [BlogCategoryController::class,'status'])->name('blog-category.status');
        Route::get('/delete', [BlogCategoryController::class,'delete'])->name('blog-category.delete');
        Route::get('/edit', [BlogCategoryController::class,'edit'])->name('blog-category.edit');
    });

    Route::group(['prefix' => 'blog-management'], function() {
        Route::get('/', [BlogController::class,'index'])->name('blog-management.index');
        Route::post('/save', [BlogController::class,'save'])->name('blog-management.save');
        Route::get('/show', [BlogController::class,'show'])->name('blog-management.show');
        Route::get('/status', [BlogController::class,'status'])->name('blog-management.status');
        Route::get('/delete', [BlogController::class,'delete'])->name('blog-management.delete');
        Route::get('/edit', [BlogController::class,'edit'])->name('blog-management.edit');
    });

    Route::group(['prefix' => 'homepage'], function() {
        Route::get('/', [HomePageController::class,'index'])->name('homepage.index');
        Route::post('/save', [HomePageController::class,'save'])->name('homepage.save');
        Route::get('/show', [HomePageController::class,'show'])->name('homepage.show');
        Route::get('/status', [HomePageController::class,'status'])->name('homepage.status');
        Route::get('/delete', [HomePageController::class,'delete'])->name('homepage.delete');
        Route::get('/edit', [HomePageController::class,'edit'])->name('homepage.edit');
    });

    Route::group(['prefix' => 'banner'], function() {
        Route::get('/', [BannnerController::class,'index'])->name('banner.index');
        Route::post('/save', [BannnerController::class,'save'])->name('banner.save');
        Route::get('/show', [BannnerController::class,'show'])->name('banner.show');
        Route::get('/status', [BannnerController::class,'status'])->name('banner.status');
        Route::get('/delete', [BannnerController::class,'delete'])->name('banner.delete');
        Route::get('/edit', [BannnerController::class,'edit'])->name('banner.edit');
    });

    Route::group(['prefix' => 'e_clinic'], function() {
        Route::get('/', [EclinicController::class,'index'])->name('e_clinic.index');
        Route::post('/save', [EclinicController::class,'save'])->name('e_clinic.save');
        Route::get('/show', [EclinicController::class,'show'])->name('e_clinic.show');
        Route::get('/status', [EclinicController::class,'status'])->name('e_clinic.status');
        Route::get('/delete', [EclinicController::class,'delete'])->name('e_clinic.delete');
        Route::get('/edit', [EclinicController::class,'edit'])->name('e_clinic.edit');
    });

    Route::group(['prefix' => 'genralPages'], function() {
        Route::get('/', [GenralPageController::class,'index'])->name('genralPages.index');
        Route::post('/save', [GenralPageController::class,'save'])->name('genralPages.save');
        Route::get('/show', [GenralPageController::class,'show'])->name('genralPages.show');
        Route::get('/status', [GenralPageController::class,'status'])->name('genralPages.status');
        Route::get('/delete', [GenralPageController::class,'delete'])->name('genralPages.delete');
        Route::get('/edit', [GenralPageController::class,'edit'])->name('genralPages.edit');
    });

    Route::group(['prefix' => 'contactpage'], function() {
        Route::get('/', [ContactPageController::class,'index'])->name('contactpage.index');
        Route::post('/save', [ContactPageController::class,'save'])->name('contactpage.save');
        Route::get('/show', [ContactPageController::class,'show'])->name('contactpage.show');
        Route::get('/status', [ContactPageController::class,'status'])->name('contactpage.status');
        Route::get('/delete', [ContactPageController::class,'delete'])->name('contactpage.delete');
        Route::get('/edit', [ContactPageController::class,'edit'])->name('contactpage.edit');
    });

    

    Route::group(['prefix' => 'sub-category'], function() {
        Route::get('/', [SubCategoryController::class,'index'])->name('sub-category.index');
        Route::post('/save', [SubCategoryController::class,'save'])->name('sub-category.save');
        Route::get('/show', [SubCategoryController::class,'show'])->name('sub-category.show');
        Route::get('/status', [SubCategoryController::class,'status'])->name('sub-category.status');
        Route::get('/delete', [SubCategoryController::class,'delete'])->name('sub-category.delete');
        Route::get('/edit', [SubCategoryController::class,'edit'])->name('sub-category.edit');
    });

    Route::group(['prefix' => 'testimonial'], function() {
        Route::get('/', [TestimonialController::class,'index'])->name('testimonial.index');
        Route::post('/save', [TestimonialController::class,'save'])->name('testimonial.save');
        Route::get('/show', [TestimonialController::class,'show'])->name('testimonial.show');
        Route::get('/status', [TestimonialController::class,'status'])->name('testimonial.status');
        Route::get('/delete', [TestimonialController::class,'delete'])->name('testimonial.delete');
        Route::get('/edit', [TestimonialController::class,'edit'])->name('testimonial.edit');
    });

    Route::group(['prefix' => 'brand_partner'], function() {
        Route::get('/', [BrandPartnerController::class,'index'])->name('brand_partner.index');
        Route::post('/save', [BrandPartnerController::class,'save'])->name('brand_partner.save');
        Route::get('/show', [BrandPartnerController::class,'show'])->name('brand_partner.show');
        Route::get('/status', [BrandPartnerController::class,'status'])->name('brand_partner.status');
        Route::get('/delete', [BrandPartnerController::class,'delete'])->name('brand_partner.delete');
        Route::get('/edit', [BrandPartnerController::class,'edit'])->name('brand_partner.edit');
    });


    Route::group(['prefix' => 'vendor-management'], function() {
        Route::get('/', [VendorController::class,'index'])->name('vendor-management.index');
        Route::post('/save', [VendorController::class,'save'])->name('vendor-management.save');
        Route::get('/show', [VendorController::class,'show'])->name('vendor-management.show');
        Route::get('/status', [VendorController::class,'status'])->name('vendor-management.status');
        Route::get('/delete', [VendorController::class,'delete'])->name('vendor-management.delete');
        Route::get('/edit', [VendorController::class,'edit'])->name('vendor-management.edit');
    });


    Route::group(['prefix' => 'user-management'], function() {
        Route::get('/', [UserController::class,'index'])->name('user-management.index');
        Route::post('/save', [UserController::class,'save'])->name('user-management.save');
        Route::get('/show', [UserController::class,'show'])->name('user-management.show');
        Route::get('/status', [UserController::class,'status'])->name('user-management.status');
        Route::get('/delete', [UserController::class,'delete'])->name('user-management.delete');
        Route::get('/edit', [UserController::class,'edit'])->name('user-management.edit');
    });


    Route::group(['prefix' => 'coupon-management'], function() {
        Route::get('/', [CouponController::class,'index'])->name('coupon-management.index');
        Route::post('/save', [CouponController::class,'save'])->name('coupon-management.save');
        Route::get('/show', [CouponController::class,'show'])->name('coupon-management.show');
        Route::get('/status', [CouponController::class,'status'])->name('coupon-management.status');
        Route::get('/delete', [CouponController::class,'delete'])->name('coupon-management.delete');
        Route::get('/edit', [CouponController::class,'edit'])->name('coupon-management.edit');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('/', [BrandController::class,'index'])->name('brand.index');
        Route::post('/save', [BrandController::class,'save'])->name('brand.save');
        Route::get('/show', [BrandController::class,'show'])->name('brand.show');
        Route::get('/status', [BrandController::class,'status'])->name('brand.status');
        Route::get('/delete', [BrandController::class,'delete'])->name('brand.delete');
        Route::get('/edit', [BrandController::class,'edit'])->name('brand.edit');
    });

    Route::group(['prefix' => 'taxation'], function() {
        Route::get('/', [TaxationController::class,'index'])->name('taxation.index');
        Route::post('/save', [TaxationController::class,'save'])->name('taxation.save');
        Route::get('/show', [TaxationController::class,'show'])->name('taxation.show');
        Route::get('/status', [TaxationController::class,'status'])->name('taxation.status');
        Route::get('/delete', [TaxationController::class,'delete'])->name('taxation.delete');
        Route::get('/edit', [TaxationController::class,'edit'])->name('taxation.edit');
    });

    
    });
// ****************admin middle ware ends*********************

Route::group(['prefix' => 'taxation'], function() {
        Route::get('/', [TaxationController::class,'index'])->name('taxation.index');
        Route::get('/show', [TaxationController::class,'show'])->name('taxation.show');
    });

Route::group(['prefix' => 'coupon-management'], function() {
        Route::get('/', [CouponController::class,'index'])->name('coupon-management.index');
        Route::get('/show', [CouponController::class,'show'])->name('coupon-management.show');
    });

Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/show', [CategoryController::class,'show'])->name('category.show');
    });
});
// ****************vendor middle ware ends*********************
// ****************Doctor  middle ware starts*********************

Route::middleware("DoctorAuth")->group(function(){
    // Route::get('dashboard',[DashboardController::class,'index']);

    Route::group(['prefix' => 'doctor-category'], function() {
        Route::get('/', [DoctorCategoryController::class,'index'])->name('doctor-category.index');
        Route::post('/save', [DoctorCategoryController::class,'save'])->name('doctor-category.save');
        Route::get('/show', [DoctorCategoryController::class,'show'])->name('doctor-category.show');
        Route::get('/status', [DoctorCategoryController::class,'status'])->name('doctor-category.status');
        Route::get('/delete', [DoctorCategoryController::class,'delete'])->name('doctor-category.delete');
        Route::get('/edit', [DoctorCategoryController::class,'edit'])->name('doctor-category.edit');
    });

    Route::group(['prefix' => 'doctor_info'], function() {
        Route::get('/', [DoctorInfoController::class,'index'])->name('doctor_info.index');

        Route::post('/save', [DoctorInfoController::class,'save'])->name('doctor_info.save');
    });



});


// ******************************frontend*************************************
    Route::get('/',[HomeController::class,'index']);
    Route::get('/product-list', [HomeController::class,'product_list'])->name('product_list');
    Route::get('/product-detail', [HomeController::class,'product_detail'])->name('product_detail');
    Route::get('/doctor-detail', [HomeController::class,'doctor_detail'])->name('doctor_detail');
    Route::get('/blog', [HomeController::class,'blog'])->name('blog');

    Route::get('/blog_detail', [HomeController::class,'blog_detail'])->name('blog_detail');

    Route::get('/user-login',[HomeController::class , 'user_login']);
    Route::get('/user-opt_verify/{id}',[HomeController::class , 'user_opt_verify']);
    Route::get('/user-register',[HomeController::class , 'user_register']);
    Route::get('/forget-password',[HomeController::class , 'forget_password']);
    // Route::get('/reset-password',[HomeController::class , 'reset_password']);
    Route::get('/password-reset/{id}',[HomeController::class , 'reset_password']);
    Route::post('reset_otp',[UserLoginController::class,'reset_otp']);
    Route::post('verify_otp',[UserLoginController::class,'verify_otp']);
    Route::post('login_user',[UserLoginController::class,'login_user']);
    Route::post('SignUpuser',[UserLoginController::class,'SignUpuser']);
    Route::post('pass_reset_otp',[UserLoginController::class,'pass_reset_otp']);
    Route::get('logout-user',[UserLoginController::class,'logout']);
    
    Route::post('/count_wishlist',[HomeController::class , 'count_wishlist']);
    Route::post('/add_wishlist',[HomeController::class , 'add_wishlist']);
    Route::post('/remove_wishlist',[HomeController::class , 'remove_wishlist']);
    Route::post('/cart',[HomeController::class , 'cart']);
    Route::post('/remove_cart',[HomeController::class , 'remove_cart']);
    Route::post('/updateCart',[HomeController::class , 'updateCart']);
    Route::post('/updateCartAmount',[HomeController::class , 'updateCartAmount']);
    Route::post('/updateCartTax',[HomeController::class , 'updateCartTax']);
    Route::post('/updateCartRemoveTax',[HomeController::class , 'updateCartRemoveTax']);
    Route::post('/count_cart',[HomeController::class , 'count_cart']);
    Route::post('/cart_item',[HomeController::class , 'cart_item']);
    Route::post('/couponcheck',[HomeController::class , 'couponcheck']);

    Route::get('/contact-us',[HomeController::class , 'contact']);
    Route::get('/e-clinic',[HomeController::class , 'e_clinic']);
    Route::get('/doctor_list',[HomeController::class , 'doctor_list'])->name('doctor_list');
    Route::get('/calendar',[CalendarController::class , 'index']);
    Route::get('/calendar/add',[CalendarController::class , 'add']);
    Route::post('/save_contact',[HomeController::class , 'save_contact']);

     Route::post('/save_newsletter',[HomeController::class , 'save_newsletter']);
     Route::post('/payment',[HomeController::class , 'payment']);

     Route::post('/save_review',[HomeController::class , 'save_review']);
     Route::get('/privacyPolicy',[HomeController::class , 'privacyPolicy']);
     Route::get('/termsCondition',[HomeController::class , 'termsCondition']);
     Route::get('/shippingPolicy',[HomeController::class , 'shippingPolicy']);
     Route::get('/refundReturn',[HomeController::class , 'refundReturn']);
     Route::get('/about-us',[HomeController::class , 'about']);
     Route::get('/siteMap',[HomeController::class , 'siteMap']);
     Route::get('/storeLocation',[HomeController::class , 'storeLocation']);
    //  Route::get('/cart-page',[HomeController::class , 'cart_page']);
    //  Route::get('/checkout-page',[HomeController::class , 'checkout_page']);
     Route::get('/BillPrint',[HomeController::class , 'BillPrint'])->name('BillPrint');
     Route::get('/faq',[HomeController::class , 'faq'])->name('faq');

     //remove for guet checkout functionality
    Route::get('/cart-page',[HomeController::class , 'cart_page']);
    Route::get('/checkout-page',[HomeController::class , 'checkout_page']);
    Route::get('genrateInvoice',[HomeController::class,'genrateInvoice'])->name('genrateInvoice');

Route::middleware("UserAuth")->group(function(){

    
    Route::get('/wishlist',[HomeController::class , 'wishlist']);
    
    Route::get('user-profile',[HomeController::class,'user_profile']);
    Route::get('order-detail',[HomeController::class,'order_detail'])->name('order_detail');
    Route::get('invoice',[HomeController::class,'invoice'])->name('invoice');
    Route::get("/r_pay", function(){
   return View::make("frontend.razorpay");
})->name('r_pay');
 Route::post('/r_payment',[HomeController::class , 'r_payment']);
 Route::post('/get_ship',[HomeController::class , 'get_ship']);
 Route::post('/order_cancel',[HomeController::class , 'order_cancel']);
});

Route::get('/makePhonePePayment',[HomeController::class , 'makePhonePePayment'])->name('makePhonePePayment');
Route::post('/phonePeCallback',[HomeController::class , 'phonePeCallback'])->name('phonePeCallback');

Route::get('phonepe',[HomeController::class,'phonePe']);
Route::post('phonepe-response',[HomeController::class,'response'])->name('response');

// ****************UserAuth middle ware ends*********************

// Route::get('admin',[AdminLogin::class,'index']);
// xsmtpsib-26b52aa69b419ac811e75e66914068e350d84ca041b6d40b1243acff393e2398-IZ009BAD1yp4EUCS

// MAIL_MAILER=smtp
// MAIL_HOST=smtp.gmail.com
// MAIL_PORT=587
// MAIL_USERNAME=mrroaster261@gmail.com
// MAIL_PASSWORD=tnvtmwnajguhbhif
// MAIL_ENCRYPTION=tls
// MAIL_FROM_ADDRESS="hello@example.com"
// MAIL_FROM_NAME="${APP_NAME}"