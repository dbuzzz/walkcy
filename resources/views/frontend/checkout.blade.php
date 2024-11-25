@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
@php
if (isset($_GET['coupon'])) {
	$coupon = $_GET['coupon'];
}else{
	$coupon = '';
}
@endphp


	<!-- Start Breadcrumb Area -->
	{{-- <section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Checkout</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Checkout</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Shop Page -->
	<section class="section-padding-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-30">
					<div class="checkout-form-main">
						<h2>Billing details</h2>
						<form method="post" action="{{url('/payment')}}">
							@csrf
							<input type="hidden" name="coupon" value="{{$coupon}}">
							<input type="hidden" name="tax" value="{{$tax}}">
							<input type="hidden" name="discount" value="{{$coupon_discount_amount}}">
							<input type="hidden" name="total" id="total_val" value="{{$total}}">
							<input type="hidden" name="shipping" id="ship_val" value="{{@$shipping}}">
							<div class="row">
								
								<div class="col-12">
									<div class="input-field">
										<label>Name *</label>
										<input type="text" name="name" id="name" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>E-mail *</label>
										<input type="email" name="email" id="email" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>Mobile *</label>
										<input type="text" name="mobile" id="mobile">
									</div>
								</div>

								<div class="col-12 pb-4">
										<label>Use Current Address</label>
										<input onclick="fill_address()" type="checkbox" value="1"  name="checkbox" id="checkbox">
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>Country *</label>
										<input type="text" name="country" id="country" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>State *</label>
										<input type="text" name="state" id="state" >
									</div>
								</div>

								<div class="col-6">
									<div class="input-field">
										<label>City *</label>
										<input type="text" name="city" id="city" >
									</div>
								</div>
								
								<div class="col-6">
									<div class="input-field">
										<label>Pincode * </label>
										<input type="text" onkeyup="getship()" name="pincode" id="pincode" >
									</div>
								</div>

								<div class="col-12">
									<div class="input-field">
										<label>Address * </label>
										<textarea onkeyup="validatecheck()" name="address" id="address"></textarea>
									</div>
								</div>
								
							</div>
						
					</div>
				</div>
				<div class="col-lg-4 mb-30">
					<div class="checkout-summery mb-30">
						<h2>Checkout summary</h2>
						<ul>
							<li>Subtotal <span>&#8377; {{@$price}}</span></li>
							<li>Shipping <span >&#8377; <span id="ship_html">{{@$shipping}}</span></span></li>
							<li>Tax <span>&#8377; {{@$tax}}</span></li>
							<li>Discount <span>&#8377; {{@$coupon_discount_amount}}</span></li>
							<li><b>Payable Total</b><span><b>&#8377; <span id="p_total">{{@$total}}</span></b></span></li>
						</ul>
						<button type="submit" id="btn" disabled class="button-1 mt-10">Place Order</button>
					</div>
					
				</div>
				</form>
			</div>
		</div>
	</section> --}}

	<div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
	<main>
		<div class="mb-4 pb-4"></div>
		<section class="shop-checkout container">
		  <h2 class="page-title">Shipping and Checkout</h2>
		  <div class="checkout-steps">
			<a href="{{url('/cart-page')}}" class="checkout-steps__item active">
			  <span class="checkout-steps__item-number">01</span>
			  <span class="checkout-steps__item-title">
				<span>Shopping Bag</span>
				<em>Manage Your Items List</em>
			  </span>
			</a>
			<a href="{{url('/checkout-page')}}" class="checkout-steps__item active">
			  <span class="checkout-steps__item-number">02</span>
			  <span class="checkout-steps__item-title">
				<span>Shipping and Checkout</span>
				<em>Checkout Your Items List</em>
			  </span>
			</a>
			<a href="#" class="checkout-steps__item">
				<span class="checkout-steps__item-number">03</span>
				<span class="checkout-steps__item-title">
					<span>Invoice</span>
					<em>View Your Invoice</em>
				</span>
			</a>
		  </div>
		  <form name="checkout-form">

			<input type="hidden" name="coupon" value="{{$coupon}}">
			<input type="hidden" name="tax" value="{{$tax}}">
			<input type="hidden" name="discount" value="{{$coupon_discount_amount}}">
			<input type="hidden" name="total" id="total_val" value="{{$total}}">
			<input type="hidden" name="shipping" id="ship_val" value="{{@$shipping}}">
			<div class="checkout-form">
			  <div class="billing-info__wrapper">
				<h4>BILLING DETAILS</h4>
				<div class="row">
				  <div class="col-md-12">
					<div class="form-floating my-3">
					  <input type="text" name="name" class="form-control" id="checkout_first_name" placeholder="Name">
					  <label for="checkout_first_name">Name</label>
					</div>
				  </div>
				  {{-- <div class="col-md-6">
					<div class="form-floating my-3">
					  <input type="text" class="form-control" id="checkout_last_name" placeholder="Last Name">
					  <label for="checkout_last_name">Last Name</label>
					</div>
				  </div> --}}
				  {{-- <div class="col-md-12">
					<div class="form-floating my-3">
					  <input type="text" class="form-control" id="checkout_company_name" placeholder="Company Name (optional)">
					  <label for="checkout_company_name">Company Name (optional)</label>
					</div>
				  </div> --}}

				  <div class="col-md-6">
					<div class="form-floating my-3">
					  <input name="country" type="text" class="form-control" id="" placeholder="Country *">
					  <label for="checkout_city">Country *</label>
					</div>
				  </div>

				  <div class="col-md-6">
					<div class="form-floating my-3">
					  <input name="state" type="text" class="form-control" id="checkout_city" placeholder="State *">
					  <label for="checkout_city">State*</label>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="form-floating my-3">
					  <input name="city" type="text" class="form-control" id="checkout_city" placeholder="Town / City *">
					  <label for="checkout_city">Town / City *</label>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="form-floating my-3">
					  <input type="number" class="form-control" name="pincode" id="checkout_zipcode" placeholder="Postcode / ZIP *">
					  <label for="checkout_zipcode">Postcode / ZIP *</label>
					</div>
				  </div>
				  
				  <div class="col-md-12">
					<div class="form-floating mt-3 mb-3">
					  <input type="text" name="address" class="form-control" id="checkout_street_address" placeholder="Street Address *">
					  <label for="checkout_company_name">Street Address *</label>
					</div>
					
				  </div>
				  
				  
				  <div class="col-md-5">
					<div class="form-floating my-3">
					  <input type="number" name="number" class="form-control" id="checkout_phone" placeholder="Phone *" onkeyup="OTPgenration()">
					  <label for="checkout_phone">Phone *</label>
					</div>
				  </div>
				  
				  <div class="col-md-4">
					<div class="form-floating my-3">
					  <input type="number" class="form-control" id="otpVerify" placeholder="OTP *">
					  <label for="otpVerify">OTP *</label>
					</div>
				  </div>
				  <div class="col-md-2">
					<div class="form-floating my-3">
					  <button type="button" class="btn btn-dark" onclick="OTPgenration(1)">Verify</button>
					</div>
				  </div>
				  <div class="col-md-12">
					<div class="form-floating my-3">
					  <input type="email" name="email" class="form-control" id="checkout_email" placeholder="Your Mail *">
					  <label for="checkout_email">Your Mail *</label>
					</div>
				  </div>
				  {{-- <div class="col-md-12">
					<div class="form-check mt-3">
					  <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="create_account">
					  <label class="form-check-label" for="create_account">CREATE AN ACCOUNT?</label>
					</div>
					<div class="form-check mb-3">
					  <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="ship_different_address">
					  <label class="form-check-label" for="ship_different_address">SHIP TO A DIFFERENT ADDRESS?</label>
					</div>
				  </div> --}}
				</div>
				<div class="col-md-12">
				  <div class="mt-3">
					<textarea class="form-control form-control_gray" placeholder="Order Notes (optional)" cols="30" rows="8"></textarea>
				  </div>
				</div>
			  </div>
			  <div class="checkout__totals-wrapper">
				<div class="sticky-content">
				  <div class="checkout__totals">
					<h3>Your Order</h3>
					<table class="checkout-cart-items">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>PRODUCT</th>
						  <th>SUBTOTAL</th>
						</tr>
					  </thead>
					  <tbody>
						@if(count($cart) !=0)
						@foreach($cart as $key=>$value)
						<tr>
						  <td>
							<img loading="lazy" src="{{$value->attributes['image']}}" width="50" height="50" alt="">
						  </td>
						  <td>
							{{$value->name}} x {{$value->quantity}}
						  </td>
						  <td>
							&#8377; {{(int)$value->price*(int)$value->quantity}}
						  </td>
						</tr>
						@endforeach
						@endif
					  </tbody>
					</table>
					<table class="checkout-totals">
					  <tbody>
						<tr>
						  <th>SUBTOTAL</th>
						  <td>&#8377; {{@$price}}</td>
						</tr>
						{{-- <tr>
						  <th>SHIPPING</th>
						  <td>Free shipping</td>
						</tr> --}}
						<tr>
						  <th>Tax</th>
						  <td>&#8377; {{@$tax}}</td>
						</tr>
						<tr>
						  <th>TOTAL</th>
						  <td>&#8377; {{@$total}}</td>
						</tr>
					  </tbody>
					</table>
				  </div>
				  <div class="checkout__payment-methods">
					
					<div class="form-check">
					  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" value="1" checked id="checkout_payment_method_3">
					  <label class="form-check-label" for="checkout_payment_method_3">
						Cash on delivery
						{{-- <span class="option-detail d-block">
						  Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.
						</span> --}}
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" value="2" id="checkout_payment_method_4">
					  <label class="form-check-label" for="checkout_payment_method_4">
						PhonePay
						{{-- <span class="option-detail d-block">
						  Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.
						</span> --}}
					  </label>
					</div>
					<div class="policy-text">
					  Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="{{url('/privacyPolicy')}}" target="_blank">privacy policy</a>.
					</div>
				  </div>
				  <button type="button" class="btn btn-primary btn-checkout" disabled onclick="redirect()"  id="buttonOrder">PLACE ORDER</button>
				</div>
			  </div>
			</div>
			<input type="hidden" name="" id="otp">
		  </form>
		</section>
	  </main>


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script type="text/javascript">
	// address = '{{@$address->address}}';
	// country = '{{@$address->country}}';
	// city = '{{@$address->city}}';
	// state = '{{@$address->state}}';
	// pincode = '{{@$address->pincode}}';

	// function discountAmount(){
	// 	console.log($('#discountAmount').val());
	// 	$('#discount').val($('#discountAmount').val());
	// 	let newAmount = Number($('#nettotal').val())-Number($('#discountAmount').val());
	// 	$('#p_total').html(newAmount);

	// };
	// function paymentChanged(){
	// 	$('#city').val($('#chanedPayments').val());

	// };
	function redirect(){
		var checkedValue = $('input[name="checkout_payment_method"]:checked').val();
		if(checkedValue == 1)
			window.location.href = siteUrl+'/genrateInvoice';
		else
			window.location.href = siteUrl+'/phonepe';
	}

	function generateOTP() {
		let otp = '';
		for (let i = 0; i < 6; i++) {
			otp += Math.floor(Math.random() * 10);
		}
		return otp;
	}

	function OTPgenration(event = 0){
		if (event) {
			let otp = $('#otp').val()
			let otpVerify = $('#otpVerify').val()
			if (otpVerify) {
				if(otp == otpVerify){
					alert('OTP Matched')
					$('#buttonOrder').attr('disabled',false)
				}else{
					$('#buttonOrder').attr('disabled',true)
					alert('Enter Correct OTP')
				}
			}
			
		}else{
			let phoneNumber = $('#checkout_phone').val()
			if (phoneNumber.length === 10 && /^\d{10}$/.test(phoneNumber)) {
				const otp = generateOTP();
				alert("Your OTP is: " +otp);
				$('#otp').val(otp)
				$('#buttonOrder').attr('disabled',true)
			}
		}
		
	}
</script>
@endsection