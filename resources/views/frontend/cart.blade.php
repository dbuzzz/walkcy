



{{-- 	<!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Cart</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Shop Page -->
	<div class="section-padding">
		<div class="container">
			<div class="row table-responsive">
				<table class="table shopping-cart-tabel table-bordered align-middle">
					<thead>
                        <tr class="text-uppercase">
                            <th class="text-center">Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Tax <input type="checkbox" name="tax" id="tax"></th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
					<tbody>
						@php 
							$cart = \Cart::getcontent();
							$price = 0;
							$subtotal = 0;
							$tax = 0;
						@endphp
						@if(count($cart) !=0)
						@foreach($cart as $key=>$value)
						<tr id="remone_cart{{$value->id}}">
                            <td class="text-center product-thumbnail">
                                <a href="{{route('product_detail',['product'=>$value->id])}}"><img src="{{$value->attributes['image']}}" alt="product"></a>
                            </td>
                            <td class="text-center product-name">
                            	<a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}({{$value->attributes['variant']}})</a>
                            </td>
                            <td class="text-center product-price-cart">
                            	<span class="amount">&#8377; {{$value->price}}</span>
                            </td>
                            <td class="text-center product-quantity">
                                <span class="quantity">
				  					<input type="number" min="1" max="1000" step="1" value="{{$value->quantity}}" onchange="updatecart(this)" data-id="
                                                {{$value->id}}">
								</span>
                            </td>
                            
                            <td class="text-center product-quantity">
                            </td>
                            @php 
								$price =(int)$value->price*(int)$value->quantity;
								$tax += ($value->attributes['tax'] / 100) * $price;
							@endphp
                            <td class="text-center product-subtotal">
                            	<span class="amount">&#8377;  {{$price}}</span>
                            </td>
                            <td class="product-remove text-center">
                                <a href="javascript:void(0)" onclick="remove_cart({{$value->id}})"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        @php 
							$subtotal +=(int)$value->price*(int)$value->quantity;
						@endphp
						@endforeach
						@endif
						
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-6">
					<a class="button-1" href="{{url('/')}}">Continue Shopping</a>
				</div>
				<!-- <div class="col-6 updae-cart text-right">
					<a class="button-1" href="{{route('product_detail',['product'=>$value->id])}}">Update Cart</a>
				</div> -->
			</div>
			<div class="row cart-page-check-out-area flex-row-reverse pt-4 ">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="m-0 mb-1">Order Total</h6>
                        </div>
                        <div class="card-body ">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Subtotal</h6><span class="text-end" id="subTotal">&#8377; {{$subtotal}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Taxes</h6><span class="text-end">&#8377; {{$tax}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Discount</h6><span class="text-end" id="discount">&#8377; 0</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                                    <h6 class="me-2">Grand Total</h6><span class="text-end text-dark" id="grand_total">&#8377; {{$subtotal+$tax}}</span>
                                </li>
                            </ul>
                            <div class="d-grid gap-2 pt-10 mx-auto">
                                <a class="button-1" onclick="checkout()">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header bg-transparent py-3">
                            <h6 class="m-0">Use Coupon Code</h6>
                        </div>
                        <div class="card-body ">
                            <form>
                                <div class="form-group mb-3">
                                    <label class="form-label">Have a Coupon Code?</label>
                                    <input type="text" id="couponCode" class="form-control" placeholder="xxxx">
                                </div>
                                <button  id="couponcheck" class="button-1">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div> --}}



    {{-- <style type="text/css">
    .qtybtn{
        display: none !important;
    }
</style>
	<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Cart</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <!-- <th class="text-center">Tax <input type="checkbox" name="removeTax" id="removeTax" onclick="updateCartRemoveTax(this)"></th> -->
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	@php 
							$cart = \Cart::getcontent();
							$price = 0;
							$subtotal = 0;
							$tax = 0;
						@endphp
						@if(count($cart) !=0)
						@foreach($cart as $key=>$value)
                        @php
                        if($value->attributes['showGST'] == 1){
                            $gstChecked = 'checked';
                        }else{
                            $gstChecked = ' ';
                        }
                        @endphp
                        <!-- @if($value->attributes['taxApplicable'] == 1)
                        <input type="hidden" value="1" class="taxApplicableValue">
                        @endif -->
                        
                        <input type="hidden" value="{{$value->attributes['taxApplicable'] == 0?1:2}}" class="taxApplicable">

						 <tr>
                                            <td class="pro-thumbnail"><a href="{{route('product_detail',['product'=>$value->id])}}"><img src="{{$value->attributes['image']}}" alt="product"></a></td>
                                            <td class="pro-title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}({{$value->attributes['variant']}})</a></td>
                                            <td class="pro-price"><span>&#8377; <input type="number" min="1" max="1000" step="1" value="{{$value->price}}" onKeyup="updateCartAmount(this)" data-id="
                                                {{$value->id}}"></span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="number" min="1" max="1000" step="1" value="{{$value->quantity}}" onchange="updatecart(this)" data-id="
                                                {{$value->id}}"></div>
                                            </td>

                                            <!-- <td class="pro-quantity">
                                                <div class="col-12">
									<div class="input-field">
										<label>Tax</label>
										
										<select {{$value->attributes['taxApplicable'] == 0?'disabled':''}} onchange="updateCartTax(this)" data-id="
                                                {{$value->id}}" class="disabledSelect">
										    <option value="">Choose</option>
										    @if($taxation)
										    @foreach($taxation as $keys=>$values)
										        <option value="{{$values->value}}" {{$value->attributes['tax'] == $values->value?'selected':''}}>{{$values->name}}</option>
										    @endforeach
										    @endif
										</select>
									</div>
								</div>
                                            </td> -->
                                            
                                            

                                             @php 
								$price =(int)$value->price*(int)$value->quantity;
								$tax += ($value->attributes['tax'] / 100) * $price;
							@endphp
                                            <td class="pro-subtotal"><span>&#8377;  {{$price}}</span></td>
                                            <td class="pro-remove"><a href="javascript:void(0)" onclick="remove_cart({{$value->id}})"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
						
                           
                           
                            
                        @php 
							$subtotal +=(int)$value->price*(int)$value->quantity;
						@endphp
						@endforeach
						@endif
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ms-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h3>Cart Totals</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                       
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">{{$subtotal}}</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Show GST</td>
                                                <td class=""><input {{$gstChecked}} type="checkbox" name="showGST" id="showGST" value="{{$value->attributes['showGST'] == 0?1:0}}" onclick="updateCartShowGST(this)"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="#" onclick="checkout()" class="btn d-block">Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection --}}


@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      <div class="checkout-steps">
        <a href="{{url('/cart-page')}}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="{{url('/checkout-page')}}" class="checkout-steps__item">
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
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

                @php 
							$cart = \Cart::getcontent();
							$price = 0;
							$subtotal = 0;
							$tax = 0;
						@endphp
						@if(count($cart) !=0)
						@foreach($cart as $key=>$value)
                        <tr>
                            <td>
                              <div class="shopping-cart__product-item">
                                <img loading="lazy" src="{{$value->attributes['image']}}" width="120" height="120" alt="">
                              </div>
                            </td>
                            <td>
                              <div class="shopping-cart__product-item__detail">
                                <h4>{{$value->name}}</h4>
                                {{-- <ul class="shopping-cart__product-item__options">
                                  <li>Color: Yellow</li>
                                  <li>Size: L</li>
                                </ul> --}}
                              </div>
                            </td>
                            <td>
                              <span class="shopping-cart__product-price">&#8377; {{$value->price}}</span>
                            </td>
                            <td>
                              <div class="qty-control position-relative">
                                <input type="number" name="quantity" value="{{$value->quantity}}" min="1" class="qty-control__number text-center" data-id="
                                {{$value->id}}" onchange="updatecart(this)">
                                {{-- <div class="qty-control__reduce">-</div> --}}
                                {{-- <div class="qty-control__increase">+</div> --}}
                              </div><!-- .qty-control -->
                            </td>
                            @php 
                                $price =(int)$value->price*(int)$value->quantity;
                                $tax += ($value->attributes['tax'] / 100) * $price;
                            @endphp
                            <td>
                              <span class="shopping-cart__subtotal">&#8377; {{$price}}</span>
                            </td>
                            <td>
                              <a href="#" class="remove-cart" onclick="remove_cart({{$value->id}})">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z"/>
                                  <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z"/>
                                </svg>                  
                              </a>
                            </td>
                          </tr>
                        @php 
							$subtotal +=(int)$value->price*(int)$value->quantity;
						@endphp
						@endforeach
						@endif
              
             
            </tbody>
          </table>
          {{-- <div class="cart-table-footer">
            <form action="https://uomo-html.flexkitux.com/Demo3/" class="position-relative bg-body">
              <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
              <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit" value="APPLY COUPON">
            </form>
            <button class="btn btn-light">UPDATE CART</button>
          </div> --}}
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Cart Totals</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>&#8377; {{$subtotal}}</td>
                  </tr>
                  {{-- <tr>
                    <th>Shipping</th>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="free_shipping">
                        <label class="form-check-label" for="free_shipping">Free shipping</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="flat_rate">
                        <label class="form-check-label" for="flat_rate">Flat rate: $49</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="local_pickup">
                        <label class="form-check-label" for="local_pickup">Local pickup: $8</label>
                      </div>
                      <div>Shipping to AL.</div>
                      <div>
                        <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                      </div>
                    </td>
                  </tr> --}}
                  <tr>
                    <th>Tax</th>
                    <td>&#8377; 0</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>&#8377; {{$subtotal}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="{{url('/checkout-page')}}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection