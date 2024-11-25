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
						<h2>Product-Detail</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Doctor-Detail</li>
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
				@if(!empty($doctor))
				<div class="col-lg-6 mb-30">
					<div class="blog-details-thumb">
		      			<div class="modal_tab">  
	                        <div class="tab-content product-details-large">
	                            <div class="tab-pane fade show active" id="tabde1" role="tabpanel" >
	                                <div class="modal_tab_img">
	                                    <a href="#"><img src="{{$doctor->image}}" alt="img"></a>    
	                                </div>
	                            </div>
	                           
	                        </div>
	                        {{-- <div class="modal_tab_button">    
	                            <ul class="nav product_navactive owl-carousel" role="tablist">
	                                <li >
	                                    <a class="nav-link active" data-toggle="tab" href="#tabde1" role="tab" aria-controls="tabde1" aria-selected="false"><img src="{{$doctor->image}}" alt="img"></a>
	                                </li>

	                                @if(!empty($img))
		                            @foreach($img as $key1=>$value1)
		                            <li>
	                                     <a class="nav-link" data-toggle="tab" href="#tabd{{$j}}" role="tab" aria-controls="tabd{{$j}}" aria-selected="false"><img src="{{$value1}}" alt="img"></a>
	                                </li>
	                                @php
		                             	$j++;
		                            @endphp
		                            @endforeach
		                            @endif

	                            </ul>
	                        </div>   --}}  
	                    </div>
                    </div>
	      		</div>
	      		<div class="col-lg-6 mb-30">
	      			<div class="products-details-content">
		      			<div class="quickview-modal-content-full">
		      				<!-- Ratting -->
		      				{{-- <div class="ratting">
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><i class="fas fa-star"></i></span>
								<span><small>( 25 Reviews )</small></span>
							</div> --}}
							<!-- Title -->
							<h3>{{$doctor->name}}</h3>
							<p>{!!$doctor->description!!}</p>
							<!-- Price -->
							<div class="pricing">
								<span>{{$doctor->price}}</span>
							</div>
							<!-- Category -->
						{{-- 	<div class="cate">
								<span><strong>Categories:</strong></span>
								<span><a href="#">{{$doctor->category}}</a></span>
							</div>

							<div class="cate">
								<span><strong>Sub-Category:</strong></span>
								<span><a href="#">{{$doctor->sub_category}}</a></span>
							</div>

							<div class="cate">
								<span><strong>Brand:</strong></span>
								<span><a href="#">{{$doctor->brand}}</a></span>
							</div> --}}
							<!-- size -->
							{{-- <div class="size">
								<h4> Size: </h4>
								<select name="size">
									<option value="0">XXL</option>
									<option value="l1">LG</option>
									<option value="1">L</option>
									<option value="2">M</option>
									<option value="3">S</option>
									<option value="4">SM</option>
								</select>
							</div> --}}
							<!-- Add To Cart -->
							<div class="quantity-add-cart">
							
								<div class="cart-btn">
									<a class="button-1" href="{{url('/calendar')}}">Book An Appointment</a>
								</div>
							</div>
							{{-- <div class="quick-view-sahre mt-50">
								<span><strong>Share :</strong></span>
								<span><a href="#"><i class="fab fa-facebook-f"></i></a></span>
								<span><a href="#"><i class="fab fa-twitter"></i></a></span>
								<span><a href="#"><i class="fab fa-pinterest-p"></i></a></span>
								<span><a href="#"><i class="fab fa-instagram"></i></a></span>
							</div> --}}
		      			</div>
	      			</div>
	      		</div>
	      		@endif
			</div>
			<div class="row mt-30">
				<div class="product-details-tab">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  {{-- 	<li class="nav-item" role="presentation">
					    	<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"  role="tab" aria-controls="description" aria-selected="true">Description</button>
					  	</li>
					  	<li class="nav-item" role="presentation">
					    	<button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"  role="tab" aria-controls="info" aria-selected="false">Additional Information</button>
					  	</li> --}}
					  	<li class="nav-item" role="presentation">
					    	<button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"  role="tab" aria-controls="review" aria-selected="false">Review</button>
					  	</li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  	{{-- <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
					  		<div class="pd-tab-item">
					  			<div class="pd-description">
						  			<p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. One</p>
						  			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
						  			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
					  			</div>
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
					  		<div class="pd-tab-item">
					  			<div class="pd-additional-info table-responsive">
					  				<table class="table table-bordered">
		                            	<tbody>
			                            		<tr>
			                                	<td>Capacity</td>
			                                	<td>5 Kg</td>
			                            	</tr>
			                                <tr>
			                                    <td>Color</td>
			                                    <td>Black, Brown, Red,</td>
			                                </tr>
			                                <tr>
			                                    <td>Water Resistant</td>
			                                    <td>Yes</td>
			                                </tr>
			                                <tr>
			                                    <td>Material</td>
			                                    <td>Artificial Leather</td>
			                                </tr>
			                        	</tbody>
			                        </table>
					  			</div>
					  		</div>
					  	</div> --}}
					  	<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					  		<div class="pd-tab-item">
					  			{{-- <h3 class="review-title">2 Reviews</h3> --}}
					  			<ul>
					  				<!-- Single -->
					  				@if(!empty($review))
						  			@foreach($review as $key=>$value)
					  				<li class="review-single">
					  					
					  					<div class="content">
						  					<div class="review-info">
							  					<h5>{{$value->name}}</h5>
							  					{{-- <small>{{strtotime(,date('d M Y'))}}</small> --}}
							  					<small>{{$value->created_at}}</small>
							  				</div>
						  					
											<div class="revie-con">
												<p>{{$value->review}}</p>
											</div>
										</div>
					  				</li>
					  				@endforeach
					  				@endif
					  				
					  			</ul>
					  			<div class="product-review-form">
						  			<h3>Add a review</h3>
						  			
									<form id="review_form">
										<input type="hidden" value="{{$doctor->id}}" name="id">
										<textarea name="review" class="form-control" placeholder="Your Review" spellcheck="false"></textarea>
										@if(Auth::user())
										<button class="button-1" type="submit">Submit Review </button>
										@else <a href="{{url('/user-login')}}" class="button-1">Login</a> @endif
									</form>
						  		</div>
					  		</div>
					  	</div>
					</div>

				</div>
			</div>
			
		</div>
	</section>
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