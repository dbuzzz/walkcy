@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')



	<!-- Start Breadcrumb Area -->
	{{-- <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Profile</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Profile</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="my-account-menu">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  
						  	<li class="nav-item" role="presentation">
						    	<a href="#" class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order" role="tab" aria-controls="order" aria-selected="false">Orders  <i class="far fa-file-alt"></i></a>
						  	</li>
						  
						  	<li class="nav-item" role="presentation">
						    	<a href="#" class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" role="tab" aria-controls="address" aria-selected="false">address  <i class="fas fa-map-marker-alt"></i></a>
						  	</li>
						  	<li class="nav-item" role="presentation">
						    	<a href="#" class="nav-link" id="acdetails-tab" data-bs-toggle="tab" data-bs-target="#acdetails" role="tab" aria-controls="acdetails" aria-selected="false">Account Details <i class="fas fa-user"></i></a>
						  	</li>
						  	<li class="nav-item">
						    	<a href="{{url('/logout-user')}}" class="nav-link" title="Logout">Logout <i class="fas fa-sign-out-alt"></i></a>
						  	</li>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="my-account-main-content">
						<div class="tab-content" id="myTabContent">
						  	
						  	<div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
						  		<div class="my-account-main-content-item">
						  			<h2>Orders</h2>
						  			<div class="table-responsive text-center">
                                        <table class="table table-bordered  table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Total</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	@php
                                            	 $i=1;
                                            	@endphp
                                            	@if($order)
                                            	@foreach($order as $key=>$value)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{date('d M Y',strtotime($value->created_at))}}</td>
                                                    <td>{{$value->total}}</td>
                                                    <td>{{$value->address}}, {{$value->country}}, {{$value->state}}, {{$value->city}}</td>

                                                    <td><a href="{{route('order_detail',['id'=>$value->id])}}"><i class="fa fa-eye"></i></a>&nbsp;<a href="{{route('invoice',['id'=>$value->id])}}"><i class="fa fa-book"></i></a>
                                                    	&nbsp;<a style="font-size:20px;color:red" href="javascript:void[0]" onclick="order_cancel({{$value->id}})"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                                @php 
                                                	$i++;
                                                @endphp
                                                @endforeach
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
						  		</div>
						  	</div>
						  	
						  	<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
						  		<div class="my-account-main-content-item">
						  			<h2>Billing Address</h2>
						  			<p>{{$add->address}}, {{$add->city}} <br>{{$add->state}} {{$add->country}}, {{$add->pincode}}</p>
						  			<p><strong>Mobile:</strong>{{$add->mobile}}</p>
						  		</div>
						  	</div>
						  	<div class="tab-pane fade" id="acdetails" role="tabpanel" aria-labelledby="acdetails-tab">
						  		<div class="my-account-main-content-item">
						  			<h2>Account details </h2>
						  			<form id="signup_form">
						  				<div class="row">
						  					<input type="hidden" value="{{Auth::user()->id}}" name="id">
						  					<input type="hidden" value="{{$add->id}}" name="address_id">
						  				<div class="single-field col-lg-6">
						  					<label>First Name</label>
						  					<input value="{{@$add->name}}" type="text" name="name" placeholder="First Name">
						  				</div>
						  				<div class="single-field col-lg-6">
						  					<label>Email</label>
						  					<input value="{{@$add->email}}" type="text" name="email" placeholder="Email">
						  				</div>

						  				<div class="single-field col-lg-6">
						  					<label>Mobile</label>
						  					<input value="{{@$add->mobile}}" type="text" name="mobile" placeholder="mobile">
						  				</div>
						  				<div class="single-field col-lg-6">
						  					<label>Password</label>
						  					<input type="password" name="password" placeholder="Password">
						  				</div>
						  				<div class="single-field col-lg-6">
						  					<label>Change Password</label>
						  					<input type="password" name="cpassword" placeholder="Change Password">
						  				</div>

						  				<h2>Address details </h2>

						  				<div class="single-field col-lg-4">
						  					<label>Country</label>
						  					<input value="{{@$add->country}}" type="text" name="country" placeholder="country">
						  				</div>

						  				<div class="single-field col-lg-4">
						  					<label>State</label>
						  					<input value="{{@$add->state}}" type="text" name="state" placeholder="state">
						  				</div>

						  				<div class="single-field col-lg-4">
						  					<label>City</label>
						  					<input value="{{@$add->city}}" type="text" name="city" placeholder="city">
						  				</div>

						  				<div class="single-field col-lg-6">
						  					<label>Pincode</label>
						  					<input value="{{@$add->pincode}}" type="text" name="pincode" placeholder="pincode">
						  				</div>

						  				<div class="single-field col-lg-6">
						  					<label>Address</label>
						  					<input value="{{@$add->address}}" type="text" name="address" placeholder="address">
						  				</div>
						  				<div class="single-field col-lg-6">
						  					<button class="button-1" type="submit">Save Now</button>
						  				</div>
						  				</div>
						  			</form>
						  		</div>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



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


	<!-- End Subscribe Form --> --}}

	<div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
	<main>
		<div class="mb-4 pb-4"></div>
		<section class="my-account container">
		  <h2 class="page-title">Account Details</h2>
		  <div class="row">
			<div class="col-lg-3">
			  <ul class="account-nav">
				{{-- <li><a href="account_dashboard.html" class="menu-link menu-link_us-s">Dashboard</a></li> --}}
				{{-- <li><a href="account_orders.html" class="menu-link menu-link_us-s">Orders</a></li> --}}
				{{-- <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li> --}}
				<li><a href="{{url('user-profile')}}" class="menu-link menu-link_us-s menu-link_active">Account Details</a></li>
				{{-- <li><a href="account_wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li> --}}
				<li><a href="{{url('/logout-user')}}" class="menu-link menu-link_us-s">Logout</a></li>
			  </ul>
			</div>
			<div class="col-lg-9">
			  <div class="page-content my-account__edit">
				<div class="my-account__edit-form">
				  <form  id="signup_form" class="needs-validation" novalidate>

					<input type="hidden" value="{{Auth::user()->id}}" name="id">
					<input type="hidden" value="{{$add->id}}" name="address_id">
					<div class="row">
					  <div class="col-md-6">
						<div class="form-floating my-3">
						  <input type="text" value="{{@$add->name}}" name="name" class="form-control" id="account_first_name" placeholder="First Name" required>
						  <label for="account_first_name">First Name</label>
						</div>
					  </div>
					  {{-- <div class="col-md-6">
						<div class="form-floating my-3">
						  <input type="text" class="form-control" id="account_last_name" placeholder="Last Name" required>
						  <label for="account_last_name">Last Name</label>
						</div>
					  </div> --}}
					  {{-- <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="text" class="form-control" id="account_display_name" placeholder="Display Name" required>
						  <label for="account_display_name">Display Name</label>
						</div>
					  </div> --}}
					  <div class="col-md-6">
						<div class="form-floating my-3">
						  <input type="email" value="{{@$add->email}}" name="email" class="form-control" id="account_email" placeholder="Email Address" required>
						  <label for="account_email">Email Address</label>
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="number" value="{{@$add->mobile}}" name="mobile" class="form-control" id="account_mobile" placeholder="mobile" required>
						  <label for="account_mobile">Mobile</label>
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="my-3">
						  <h5 class="text-uppercase mb-0">Password Change</h5>
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="password" name="password" class="form-control" id="account_current_password" placeholder="password">
						  <label for="account_current_password">Password</label>
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="password" name="cpassword" class="form-control" id="account_new_password" placeholder="password">
						  <label for="account_new_password">Confirm password</label>
						</div>
					  </div>

					  <div class="col-md-12">
						<div class="my-3">
						  <h5 class="text-uppercase mb-0">Address Change</h5>
						</div>
					  </div>
					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="text" value="{{@$add->country}}" name="country" class="form-control" id="account_current_country" placeholder="country" required>
						  <label for="account_current_country">Country</label>
						</div>
					  </div>

					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="text" value="{{@$add->state}}" name="state" class="form-control" id="account_current_state" placeholder="state" required>
						  <label for="account_current_state">State</label>
						</div>
					  </div>

					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="text" value="{{@$add->city}}" name="city" class="form-control" id="account_current_city" placeholder="city" required>
						  <label for="account_current_city">City</label>
						</div>
					  </div>

					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="number" value="{{@$add->pincode}}" name="pincode" class="form-control" id="account_current_pincode" placeholder="pincode" required>
						  <label for="account_current_pincode">Pincode</label>
						</div>
					  </div>

					  <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="text" value="{{@$add->address}}" name="address" class="form-control" id="account_current_address" placeholder="address" required>
						  <label for="account_current_address">Address</label>
						</div>
					  </div>
					  
					  {{-- <div class="col-md-12">
						<div class="form-floating my-3">
						  <input type="password" class="form-control" data-cf-pwd="#account_new_password" id="account_confirm_password" placeholder="Confirm new password" required>
						  <label for="account_confirm_password">Confirm new password</label>
						  <div class="invalid-feedback">Passwords did not match!</div>
						</div>
					  </div> --}}
					  <div class="col-md-12">
						<div class="my-3">
						  <button class="btn btn-primary">Save Changes</button>
						</div>
					  </div>
					</div>
				  </form>

				  {{-- <form id="signup_form">
					<div class="row">
						<input type="hidden" value="{{Auth::user()->id}}" name="id">
						<input type="hidden" value="{{$add->id}}" name="address_id">
					<div class="single-field col-lg-6">
						<label>First Name</label>
						<input value="{{@$add->name}}" type="text" name="name" placeholder="First Name">
					</div>
					<div class="single-field col-lg-6">
						<label>Email</label>
						<input value="{{@$add->email}}" type="text" name="email" placeholder="Email">
					</div>

					<div class="single-field col-lg-6">
						<label>Mobile</label>
						<input value="{{@$add->mobile}}" type="text" name="mobile" placeholder="mobile">
					</div>
					<div class="single-field col-lg-6">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password">
					</div>
					<div class="single-field col-lg-6">
						<label>Change Password</label>
						<input type="password" name="cpassword" placeholder="Change Password">
					</div>

					<h2>Address details </h2>

					<div class="single-field col-lg-4">
						<label>Country</label>
						<input value="{{@$add->country}}" type="text" name="country" placeholder="country">
					</div>

					<div class="single-field col-lg-4">
						<label>State</label>
						<input value="{{@$add->state}}" type="text" name="state" placeholder="state">
					</div>

					<div class="single-field col-lg-4">
						<label>City</label>
						<input value="{{@$add->city}}" type="text" name="city" placeholder="city">
					</div>

					<div class="single-field col-lg-6">
						<label>Pincode</label>
						<input value="{{@$add->pincode}}" type="text" name="pincode" placeholder="pincode">
					</div>

					<div class="single-field col-lg-6">
						<label>Address</label>
						<input value="{{@$add->address}}" type="text" name="address" placeholder="address">
					</div>
					<div class="single-field col-lg-6">
						<button class="button-1" type="submit">Save Now</button>
					</div>
					</div>
				</form> --}}
				</div>
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