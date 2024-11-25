{{-- @extends('frontend.layout')
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
							<form id="forget_password">
								<div class="single-field">
									<input type="email" name="email" placeholder="Email">
									<i class="fas fa-user"></i>
								</div>
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
	<!-- End Shop Page -->



	<!-- Start Subscribe Form -->
	<section class="subscribe-form pt-70 pb-20">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="subscribe-left mb-50">
						<div class="img">
							<img src="{{asset('')}}frontend_assets/img/subscribe.png" alt="img">
						</div>
						<div class="content">
							<h2>Newsletter</h2>
							<p>Subsribe here for get every single updates</p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="subscribe-form">
						<form id="newslatter">
							<input type="email" name="email" placeholder="Enter Your Email Address">
							<button type="submit">subscribe now</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Subscribe Form -->


	<!-- End Subscribe Form -->


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/user_login.js')}}"></script>
@endsection --}}


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
            <form name="login-form" id="forget_password" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control form-control_gray" id="customerNameEmailInput1" placeholder="Email address *" required>
                <label for="customerNameEmailInput1">Email address *</label>
              </div>
    
    
              <button class="btn btn-primary w-100 text-uppercase" type="submit">Send</button>
    
              
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