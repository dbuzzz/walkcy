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
						<h2>Blog-Detail</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Blog-Detail</li>
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
				<div class="col-lg-8">
					<div class="row">
						<!-- Single -->
						<div class="col-12 mb-30">
							<div class="blog-item-2">
								<div class="thumbnail">
									<a href="{{route('blog_detail',['id'=>@$blog->id])}}">
										<img src="{{@$blog->image}}" alt="blog">
									</a>
								</div>
								<div class="content">
									
									<h2 class="title"><a href="{{route('blog_detail',['id'=>@$blog->id])}}">{{@$blog->name}}</a></h2>
									<div class="meta mb-20">
										
										<span><i class="far fa-calendar-alt"></i>{{date('d M Y', strtotime(@$blog->created_at))}}</span>
									</div>
									<p>{{@$blog->description}}</p>
									
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="col-lg-4">
					
					<div class="widgets-single mb-30">
						<h2>Latest Blog</h2>
						<div class="popular-blog-full">
							<!-- single -->
							@if(!empty($blogs))
							@foreach($blogs as $key => $value)
							<div class="item">
								<div class="thumb">
									<a href="{{route('blog_detail',['id'=>$value->id])}}">
										<img src="{{$value->image}}" alt="blog">
									</a>
								</div>
								<div class="content">
									<h4><a href="{{route('blog_detail',['id'=>$value->id])}}">{{$value->name}}</a></h4>
									<span><i class="far fa-date"></i>{{date('d M Y', strtotime(@$blog->created_at))}}</span>
								</div>
							</div>
							@endforeach
							@endif
							
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


	<!-- End Subscribe Form -->


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection