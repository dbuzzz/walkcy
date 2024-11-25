@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Product</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Doctor</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Area -->

	<!-- Start Shop Page -->
	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- ltn__shop-options -->
					<div class="row mb-30">
						<div class="col-12">
							{{-- <div class="ltn__shop-options">
								
								<div class="list-single">
									<div class="showing-product-number text-right">
	                                    <span>Showing 1–12 of 18 results</span>
	                                </div>
								</div>
								<div class="list-single">
									<div class="woo-product-shorting">
										<select name="srot">
											<option value="0">Default Sorting</option>
											<option value="1">Sort by popularity</option>
											<option value="2">Sort by new arrivals</option>
											<option value="3">Sort by price: low to high</option>
											<option value="4">Sort by price: high to low</option>
										</select>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
					<!-- Products -->
					<div class="row">
						<div class="tab-content" id="myTabContent">
						  
						  	<div class="tab-pane fade shop-listview show active" id="listView" role="tabpanel" aria-labelledby="listView-tab">
						  		<div class="row">
						  			<!-- Single -->
						  			@if(!empty($doctor))
						  			@foreach($doctor as $key=>$value)
						  			<div class="col-lg-12">
						  				<div class="product-list-item mb-30">
						  					<div class="row">
						  						<div class="col-sm-4 d-flex">
						  							<div class="thumbnail">
						  								<a href="{{route('doctor_detail',['doctor'=>$value->id])}}">
						  									<img src="{{$value->image}}" alt="img">
						  								</a>
						  							</div>
						  						</div>
						  						<div class="col-sm-8 align-self-center">
						  							<div class="content">
						  								<h2 class="title">
						  									<a href="{{route('doctor_detail',['doctor'=>$value->id])}}">{{$value->name}}</a>
						  								</h2>
						  								
														<div class="pricing">
															<span>{{$value->price}}</span>
														</div>
														<p>{!!$value->heading!!}</p>
													
						  							</div>
						  						</div>
						  					</div>
						  				</div>
						  			</div>
									@endforeach
						  			@endif						  			
						  			
						  		</div>
						  	</div>
						</div>
					</div>
					<!-- Pagination -->
					{{-- <div class="row mt-15 mb-30">
						<div class="col-12 text-center">
							<div class="fr-pagination">
								<ul>
									<li><a href="#"><i class="fas fa-angle-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li><span>2</span></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#"><i class="fas fa-angle-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Page -->
	
@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection