@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')



	{{-- <!-- Start Breadcrumb Area -->
	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Wishlist</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Wishlist</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<div class="section-padding">
		<div class="container">
			<div class="row table-responsive">
				<table class="table shopping-cart-wishlist-tabel table-bordered align-middle">
					<thead>
                        <tr class="text-uppercase">
                            <th class="text-center">Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Add To Cart</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if($wishlist)
                    	@foreach($wishlist as $key=>$value)
						<tr>
                            <td class="text-center product-thumbnail">
                                <a href="{{route('product_detail',['product'=>$value->id])}}"><img src="{{$value->image}}" alt="img"></a>
                            </td>
                            <td class="text-center product-name">
                            	<a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
                            </td>
                            
                            <td class="text-center">
                            	<a class="button-1"  href="javascript:void(0)" onclick="add_cart({{$value->id}})">Add to Cart</a>
                            </td>
                            <td class="product-remove text-center">
                                <a href="javascript:void(0)" onclick="remove_wishlist({{$value->id}})"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

						
					</tbody>
				</table>
			</div>
		</div>
	</div>



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
	</section> --}}
	<!-- End Subscribe Form -->

	<!-- End Subscribe Form -->
	<div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
	<main>
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Wishlist</h2>
      
      <div class="shopping-cart">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                {{-- <th>Price</th> --}}
                <th>Add To Cart</th>
                {{-- <th>Action</th> --}}
              </tr>
            </thead>
            <tbody>

				@if($wishlist)
                    	@foreach($wishlist as $key=>$value)
						<tr>
                            <td>
                              <div class="shopping-cart__product-item">
                                <a href=""><img loading="lazy" src="{{$value->image}}" width="120" height="120" alt=""></a>
                              </div>
                            </td>
                            <td>
                              <div class="shopping-cart__product-item__detail">
                                <h4>{{$value->name}}</h4>
                                <ul class="shopping-cart__product-item__options">
                                  <li>Price: {{$value->price}}</li>
                                  {{-- <li>Size: L</li> --}}
                                </ul>
                              </div>
                            </td>
                            <td>
								<a class="button-1"  href="javascript:void(0)" onclick="add_cart({{$value->id}})">Add to Cart</a>
                            </td>
                            
                            <td>
                              <a href="#" class="remove-cart" onclick="remove_wishlist({{$value->id}})">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z"/>
                                  <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z"/>
                                </svg>                  
                              </a>
                            </td>
                          </tr>
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
@endsection