{{-- @php 
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
@endphp
@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

	<!-- Start Shop Page -->
	<div class="lr-page pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lr-user-holder">
						<div class="lr-user-holder-form">
							<h2>Enter your Registered E-mail</h2>
							<form id="reset_otp">
								<input type="hidden" name="id" value="{{$uriSegments[2]}}">
								<div class="single-field">
									<span style="color:blue">An Opt is being send on the given email</span>
									<input type="text" name="otp" placeholder="OTP">
									<i class="fas fa-image"></i>
								</div><div class="single-field">
									<input type="password" name="password" placeholder="Password">
									<i class="fas fa-key"></i>
								</div><div class="single-field">
									<input type="password" name="confirm_password" placeholder="Confirm Passowrd">
									<i class="fas fa-key"></i>
								</div>

								<input type="checkbox" id="show_pass" onclick="show_passs()" value="1" class="float-left">
									<span>Show Password</span>
								<div class="single-field mb-0">
									<button class="button-1" type="submit">Send</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/user_login.js')}}"></script>
@endsection --}}
@php 
	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
@endphp
@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
@endsection
@section('content')
<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<main>
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <h2 class="d-none">Forget Password</h2>
      
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
          <div class="login-form">
            <form name="login-form" id="reset_otp" class="needs-validation" novalidate>
			  <input type="hidden" name="id" value="{{$uriSegments[2]}}">
              <div class="form-floating mb-3">
                <input name="otp" type="number" class="form-control form-control_gray" id="customerNameEmailInput1a" placeholder="OTP*" required>
                <label for="customerNameEmailInput1a">Enter OTP *</label>
              </div>
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control form-control_gray" id="customerNameEmailInput1" placeholder="Password *" required>
                <label for="customerNameEmailInput1">Password *</label>
              </div>
              <div class="form-floating mb-3">
                <input name="confirm_password" type="password" class="form-control form-control_gray" id="customerNameEmailInput1bs" placeholder="Confirm Password *" required>
                <label for="customerNameEmailInput1bs">Confirm Password *</label>
              </div>
    
    
              <button class="btn btn-primary w-100 text-uppercase" type="submit">Save</button>
    
              
            </form>
          </div>
        </div>
        
      </div>
    </section>
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