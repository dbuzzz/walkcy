@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')



	<!-- Start Breadcrumb Area -->
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
                            <th class="text-center">Order Status</th>
                        </tr>
                    </thead>
					<tbody>
					
						@if(count($order_details) !=0)
						@foreach($order_details as $key=>$value)
						<tr id="remone_cart{{$value->id}}">
                            <td class="text-center product-thumbnail">
                                <a href="{{route('product_detail',['product'=>$value->id])}}"><img src="{{$value->image}}" alt="product"></a>
                            </td>
                            <td class="text-center product-name">
                            	<a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}({{$value->variation}})</a>
                            </td>
                            <td class="text-center product-price-cart">
                            	<span class="amount">&#8377; {{$value->price}}</span>
                            </td>
                            <td class="text-center product-quantity">
                                <span class="quantity">
				  					{{$value->quantity}}
								</span>
                            </td><td class="text-center product-quantity">
                                <span class="quantity">
				  					{{$value->order_status}}
								</span>
                            </td>
                            
                        </tr>
                       
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
			{{-- <div class="row cart-page-check-out-area flex-row-reverse pt-4 ">
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="m-0 mb-1">Order Total</h6>
                        </div>
                        <div class="card-body ">
                            <ul class="list-unstyled">
                               
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Taxes</h6><span class="text-end">{{$order_details[0]->all_tax}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="me-2 text-body">Discount</h6><span class="text-end" id="discount">{{$order_details[0]->all_discount}}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center border-top pt-3 mt-3">
                                    <h6 class="me-2">Grand Total</h6><span class="text-end text-dark" id="grand_total">{{$order_details[0]->all_total}}</span>
                                </li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
                
            </div> --}}
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
@endsection