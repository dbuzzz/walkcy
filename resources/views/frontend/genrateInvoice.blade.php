@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

{{-- <main>
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
            <em>Download Your Invoice</em>
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
                               
                              </div>
                            </td>
                            <td>
                              <span class="shopping-cart__product-price">&#8377; {{$value->price}}</span>
                            </td>
                            <td>
                              <div class="qty-control position-relative">
                                <input type="number" name="quantity" value="{{$value->quantity}}" min="1" class="qty-control__number text-center" data-id="
                                {{$value->id}}" onchange="updatecart(this)">
                              </div>
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
  </main> --}}
  <div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
  <main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Order Received</h2>
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
        <a href="#" class="checkout-steps__item active">
            <span class="checkout-steps__item-number">03</span>
            <span class="checkout-steps__item-title">
                <span>Invoice</span>
                <em>View Your Invoice</em>
            </span>
        </a>
      </div>
      <div class="order-complete">
        <div class="order-complete__message">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="40" cy="40" r="40" fill="#B9A16B"/>
            <path d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z" fill="white"/>
          </svg>
          <h3>Your order is Placed!</h3>
          <p>Thank you. Your order has been received.</p>
        </div>
        <div class="order-info">
          <div class="order-info__item">
            <label>Order Number</label>
            <span>{{rand(1000,9999)}}</span>
          </div>
          <div class="order-info__item">
            <label>Date</label>
            <span>{{date('d M Y')}}</span>
          </div>
          <div class="order-info__item">
            <label>Total</label>
            <span>&#8377; {{@$total}}</span>
          </div>
          <div class="order-info__item">
            <label>Paymetn Method</label>
            <span>COD</span>
          </div>
        </div>
        <div class="checkout__totals-wrapper">
          <div class="checkout__totals">
            <h3>Order Details</h3>
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
                    
                    <td class="float-right">&#8377; {{@$price}}</td>
                  </tr>
                  {{-- <tr>
                    <th>SHIPPING</th>
                    <td>Free shipping</td>
                  </tr> --}}
                  <tr>
                    <th>Tax</th>
                    
                    <td class="float-right">&#8377; {{@$tax}}</td>
                  </tr>
                  <tr>
                    <th>TOTAL</th>
                    
                    <td class="float-right">&#8377; {{@$total}}</td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </section>
  </main>

  @endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection