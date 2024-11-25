@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	{{-- <!-- Start Shop Page -->
	<div class="lr-page pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lr-user-holder">
						<div class="lr-user-holder-form">
							<h2>Create your account</h2>
							<form id="signup_form">
								<div class="single-field">
									<input type="text" name="name" placeholder="UserName">
									<i class="fas fa-user"></i>
								</div>
								<div class="single-field">
									<input type="email" name="email" placeholder="Email Address">
									<i class="fas fa-envelope"></i>
								</div>

								<div class="single-field">
									<input type="text" name="mobile" placeholder="Mobile">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="single-field">
									<input type="password" name="password" placeholder="Password">
									<i class="fas fa-lock"></i>
								</div>
								<div class="single-field">
									<input type="password" name="confirm_password" placeholder="Confirm Password">
									<i class="fas fa-lock"></i>
								</div>
									<input type="checkbox" id="show_pass" onclick="show_passs()" value="1">
								<span>Show Password</span>
									<br>

									<input type="checkbox" name="is_whatsapp" placeholder="Confirm Password" value="1">
									<span>Want to get updates on WhatsApp</span>
									<br>
								<div class="single-field mb-0">
									<button class="button-1" type="submit">Creat Account</button>
								</div>
							</form>
						</div>
						<div class="lr-user-holder-botm">
							<p>Already have an account? <a href="{{url('/user-login')}}">Log In</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Register</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="login-reg-form-wrap">
                                <h2>Register</h2>
                                <form id="signup_form">
                                    <div class="single-input-item">
                                        <input type="text" placeholder="name" name="name" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Email" name="email" required />
                                    </div><div class="single-input-item">
                                        <input type="number" placeholder="mobile" name="mobile" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" name="confirm_password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                         
                                            <a href="{{url('/user-login')}}" class="forget-pwd">Login?</a>
                                            <a href="{{url('/forget-password')}}" class="forget-pwd">Forget Password?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" class="btn">Register</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>



@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/user_login.js')}}"></script>
@endsection