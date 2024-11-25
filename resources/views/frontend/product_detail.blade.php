{{-- @extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
@endsection
@section('content')

<div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
<main>
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container product-single__type-9">
      <div class="row">
        <div class="col-lg-7">
          <div class="product-single__media" data-media-type="vertical-thumbnail">
            <div class="product-single__image">
              <div class="swiper-container">
                <div class="swiper-wrapper">

					@php
					$img = explode(',', $product->path);
					$i = 0;
					$j = 0;
			   		@endphp
					<div class="swiper-slide product-single__image-item">
						<img loading="lazy" class="h-auto" src="{{$product->image}}" width="674" height="674" alt="">
						<a data-fancybox="gallery" href="{{$product->image}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
						  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_zoom" /></svg>
						</a>
					  </div>
					@if(!empty($img))
				   @foreach($img as $key1=>$value1)
					   <div class="swiper-slide product-single__image-item">
						<img loading="lazy" class="h-auto" src="{{$value1}}" width="674" height="674" alt="">
						<a data-fancybox="gallery" href="{{$value1}}" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
						  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_zoom" /></svg>
						</a>
					  </div>
				   @php
						$j++;
				   @endphp
				   @endforeach
				   @endif
                 
                </div>
                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></div>
                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></div>
              </div>
            </div>
            <div class="product-single__thumbnail">
              <div class="swiper-container">
                <div class="swiper-wrapper">

					@php
					$img = explode(',', $product->path);
					$i = 0;
					$j = 0;
			   		@endphp
					<div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="{{$product->image}}" width="104" height="104" alt=""></div>
					@if(!empty($img))
				   @foreach($img as $key1=>$value1)
					   <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="{{$value1}}" width="104" height="104" alt=""></div>
				   @php
						$j++;
				   @endphp
				   @endforeach
				   @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="d-flex justify-content-between mb-4 pb-md-2">
            <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
              <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
              <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
              <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Product Detail</a>
            </div><!-- /.breadcrumb -->
          </div>
          <h1 class="product-single__name">{{$product->name}}</h1>
          <div class="product-single__price">
            <span class="current-price">&#8377;  {{$product->price}}</span>
          </div>
          <form name="addtocart-form" method="post">
            <div class="product-single__swatches">
              <div class="product-swatch text-swatches">
                <label>Sizes</label>
                <div class="swatch-list">
                  <input type="radio" name="size" id="swatch-1">
                  <label class="swatch js-swatch" for="swatch-1" aria-label="Extra Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Small">XS</label>
                  <input type="radio" name="size" id="swatch-2" checked>
                  <label class="swatch js-swatch" for="swatch-2" aria-label="Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Small">S</label>
                  <input type="radio" name="size" id="swatch-3">
                  <label class="swatch js-swatch" for="swatch-3" aria-label="Middle" data-bs-toggle="tooltip" data-bs-placement="top" title="Middle">M</label>
                  <input type="radio" name="size" id="swatch-4">
                  <label class="swatch js-swatch" for="swatch-4" aria-label="Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Large">L</label>
                  <input type="radio" name="size" id="swatch-5">
                  <label class="swatch js-swatch" for="swatch-5" aria-label="Extra Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Large">XL</label>
                </div>
              </div>
              <div class="product-swatch color-swatches">
                <label>Color</label>
                <div class="swatch-list">
                  <input type="radio" name="color" id="swatch-11">
                  <label class="swatch swatch-image js-swatch" for="swatch-11" aria-label="Red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red">
                    <img loading="lazy" src="{{asset('')}}frontend_assets/images/products/swatch_0.jpg" width="60" height="60" alt="">
                  </label>
                  <input type="radio" name="color" id="swatch-12" checked>
                  <label class="swatch swatch-image js-swatch" for="swatch-12" aria-label="Blue" data-bs-toggle="tooltip" data-bs-placement="top" title="Blue">
                    <img loading="lazy" src="{{asset('')}}frontend_assets/images/products/swatch_1.jpg" width="60" height="60" alt="">
                  </label>
                  <input type="radio" name="color" id="swatch-13">
                  <label class="swatch swatch-image js-swatch" for="swatch-13" aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top" title="Black">
                    <img loading="lazy" src="{{asset('')}}frontend_assets/images/products/swatch_2.jpg" width="60" height="60" alt="">
                  </label>
                </div>
              </div>
            </div>
            <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div><!-- .qty-control -->
              <button type="submit" onclick="add_cart({{$product->id}})" class="btn btn-primary btn-addtocart js-open-aside" data-aside="cartDrawer">Add to Cart</button>
            </div>
          </form>
          <div class="product-single__addtolinks">
            <a href="#" onclick="add_wishlist({{$product->id}})" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg><span>Add to Wishlist</span></a>
			<br>
			@foreach($share as $key=>$value)
				<a href="{{$value}}"><i class="fab fa-{{$key}}"></i></a>
			@endforeach
          </div>
        </div>
      </div>
      <div class="product-single__details-list">
        <h2 class="product-single__details-list__title">Description</h2>
        <div class="product-single__details-list__content">
          <div class="product-single__description">
           {!!$product->description!!}
          </div>
        </div>
       
      </div>
    </section>
    <section class="products-carousel container">
      <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>

      <div id="related_products" class="position-relative">
        <div class="swiper-container js-swiper-slider"
          data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
          <div class="swiper-wrapper">

			@if(!empty($related_product) and count($related_product) !=0)
			@foreach($related_product as $key=>$value)

				<div class="swiper-slide product-card">
					<div class="pc__img-wrapper">
					  <a href="{{route('product_detail',['product'=>$value->id])}}">
						<img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
						<img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
					  </a>
					  <button onclick="add_cart({{$value->id}})" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
					</div>
	  
					<div class="pc__info position-relative">
					  <h6 class="pc__title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h6>
					  <div class="product-card__price d-flex">
						<span class="money price">&#8377;  {{$value->price}}</span>
					  </div>

					  @if(Auth::user())
						<button onclick="add_wishlist({{$value->id}})" class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
						<svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
						</button>
					  @endif
					</div>
				  </div>
			@endforeach
			@endif

            


          </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
        </div><!-- /.products-carousel__prev -->
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
        </div><!-- /.products-carousel__next -->

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
        <!-- /.products-pagination -->
      </div><!-- /.position-relative -->

    </section><!-- /.products-carousel container -->
  </main>

  @endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script type="text/javascript"> $(document).ready(function(){
$(".small_img").hover (function(){
$(".big_img").attr('src', $(this).attr('src'));
});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#imgs').imagezoomsl({
			zoomrange:[3,3]
		});
	});
	function bigImg(obj){
		console.log(obj);
	}
</script>
@endsection --}}
@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
@endsection
@section('content')
<div class="mb-5 pb-xl-5"></div>
<div class="mb-5 pb-xl-5"></div>
<main>
  <section class="product-single product-single__type-7 container">
    <div class="row">
      <div class="col-lg-7">
        <div class="mb-md-1 pb-md-3"></div>
        <div class="product-single__media" data-media-type="grid-image">
          <div class="product-single__image">
            
            

              @php
              $img = explode(',', $product->path);
              $i = 0;
              $j = 0;
                @endphp
              <div class="product-single__image-item"> 
                <img loading="lazy" class="h-auto" src="{{$product->image}}" width="798" height="740" alt="">
              </div>
              @if(!empty($img))
              @foreach($img as $key1=>$value1)
                <div class="product-single__image-item">
                  <img loading="lazy" class="h-auto" src="{{$value1}}" width="394" height="365" alt="">
                </div>
              @php
                $j++;
              @endphp
              @endforeach
              @endif
            
          </div>
        </div>
        {{-- <div class="product-single__additional-info">
          <a href="#" data-bs-toggle="modal" data-bs-target="#deliveryModal">Composition and Care</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#deliveryModal">In-Store Availability</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#deliveryModal">Delivery and Return</a>
        </div> --}}
      </div>
      <div class="col-lg-5">
        <div class="sticky-content">
          <div class="mb-md-1 pb-md-3"></div>
          <div class="d-flex justify-content-between mb-4 pb-md-2">
            {{-- <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
              <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
              <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
              <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
            </div><!-- /.breadcrumb -->   --}}
            {{-- <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
              <a href="#" class="text-uppercase fw-medium"><svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg><span class="menu-link menu-link_us-s">Prev</span></a>
              <a href="#" class="text-uppercase fw-medium"><span class="menu-link menu-link_us-s">Next</span><svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg></a>
            </div><!-- /.shop-acs --> --}}
          </div>
          <h1 class="product-single__name">{{$product->name}}</h1>
          {{-- <div class="product-single__rating">
            <div class="reviews-group d-flex">
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
            </div>
            <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
          </div> --}}
          <div class="product-single__price">
            <span class="current-price">&#8377;  {{$product->price}}</span>
          </div>
          <div class="product-single__short-desc">
            <p>{!!$product->description!!}</p>
          </div>
          <form name="addtocart-form" method="post">
            <div class="product-single__swatches">
              <div class="product-swatch text-swatches">
                <label>Sizes</label>
                <div class="swatch-list">
                  <input type="radio" name="size" id="swatch-1">
                  <label class="swatch js-swatch" for="swatch-1" aria-label="Extra Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Small">8</label>
                  <input type="radio" name="size" id="swatch-2" checked>
                  <label class="swatch js-swatch" for="swatch-2" aria-label="Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Small">9</label>
                  <input type="radio" name="size" id="swatch-3">
                  <label class="swatch js-swatch" for="swatch-3" aria-label="Middle" data-bs-toggle="tooltip" data-bs-placement="top" title="Middle">10</label>
                  <input type="radio" name="size" id="swatch-4">
                  <label class="swatch js-swatch" for="swatch-4" aria-label="Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Large">11</label>
                  <input type="radio" name="size" id="swatch-5">
                  <label class="swatch js-swatch" for="swatch-5" aria-label="Extra Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Large">12</label>
                </div>
              </div>
              <div class="product-swatch color-swatches">
                <label>Color</label>
                <div class="swatch-list">
                  <input type="radio" name="color" id="swatch-11">
                  <label class="swatch swatch-color js-swatch" for="swatch-11" aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" style="color: #222"></label>
                  <input type="radio" name="color" id="swatch-12" checked>
                  <label class="swatch swatch-color js-swatch" for="swatch-12" aria-label="Red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red" style="color: #C93A3E"></label>
                  <input type="radio" name="color" id="swatch-13">
                  <label class="swatch swatch-color js-swatch" for="swatch-13" aria-label="Grey" data-bs-toggle="tooltip" data-bs-placement="top" title="Grey" style="color: #E4E4E4"></label>
                </div>
              </div>
            </div>
            <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                {{-- <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div> --}}
              </div><!-- .qty-control -->
              <button type="submit" onclick="add_cart({{$product->id}})" class="btn btn-primary btn-addtocart js-open-aside" data-aside="cartDrawer" style=" width: 30%; ">Add to Cart</button>
              @if(Auth::user())
              <button onclick="add_cart({{$product->id}},1)" class="btn btn-info btn-addtocart js-open-aside" title="Buy Now" style=" width: 30%; ">Buy Now</button>
              @endif
            </div>
          </form>
          <div class="product-single__addtolinks">

            @if(Auth::user())
						  <a href="#" onclick="add_wishlist({{$product->id}})" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg><span>Add to Wishlist</span></a>
					  @endif
            
            <share-button class="share-button">
              @foreach($share as $key=>$value)
                <a href="{{$value}}"><i class="fab fa-{{$key}}"></i></a>
              @endforeach
            </share-button>
          </div>
          {{-- <div class="product-single__meta-info">
            <div class="meta-item">
              <label>Categories:</label>
              <span>Casual & Urban Wear, Jackets, Men</span>
            </div>
            <div class="meta-item">
              <label>Tags:</label>
              <span>biker, black, bomber, leather</span>
            </div>
          </div> --}}

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-11">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1" aria-expanded="true" aria-controls="accordion-collapse-1">
                Description
                <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
              </button>
            </h5>
            <div id="accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="accordion-heading-11" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <div class="product-single__description">
                  <h3 class="block-title mb-4">The all-new HYBRID NX Men's</h3>
                  <p class="content">Running Shoes
                    is a game-changer in the world of everyday cushioned running shoes. Designed with HYBRID foam and a rubber outsole, this shoe flawlessly fuses street style with modern technology.HYBRID: PUMA's solution for cushioning and responsiveness, a combination of the two best technologies from PUMA IGNITE Foam and NRGY Beads.</p>
                  <div class="row">
                    <div class="col-lg-6">
                      <h3 class="block-title">Why choose product?</h3>
                      <ul class="list text-list">
                        <li>Heel type: Flat</li>
                        <li>Shoe width: Regular fit</li>
                        <li>Shoe pronation: Neutral</li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <h3 class="block-title">Sample Number List</h3>
                      <ol class="list text-list">
                        <li>Heel-to-toe-drop: 12 mm</li>
                        <li>Built for an average running distance of upto 500 km</li>
                        <li>Knitted upper for breathability</li>
                      </ol>
                    </div>
                  </div>
                  <h3 class="block-title mb-0">Lining</h3>
                  <p class="content">100% Polyester, Main: 100% Polyester.</p>
                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2" aria-expanded="false" aria-controls="accordion-collapse-2">
                Additional Information
                <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
              </button>
            </h5>
            <div id="accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="accordion-heading-2" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <div class="product-single__addtional-info">
                  <div class="item">
                    <label class="h6">Style</label>
                    <span>192259_02</span>
                  </div>
                  <div class="item">
                    <label class="h6">Dimensions</label>
                    <span>90 x 60 x 90 cm</span>
                  </div>
                  <div class="item">
                    <label class="h6">Size</label>
                    <span>8,9,10,11,12</span>
                  </div>
                  <div class="item">
                    <label class="h6">Color</label>
                    <span>Black, Orange, White</span>
                  </div>
                  <div class="item">
                    <label class="h6">Storage</label>
                    <span>Shoe-style dress with a rugged</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3" aria-expanded="false" aria-controls="accordion-collapse-3">
                Reviews ({{!empty($review)?count($review):0}})
                <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
              </button>
            </h5>
            <div id="accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <h2 class="product-single__reviews-title">Reviews</h2>
                <div class="product-single__reviews-list">
                  @if($review)
                  @foreach($review as $key=>$value)
                  <div class="product-single__reviews-item">
                   
                    <div class="customer-review">
                      <div class="customer-name">
                        <h6>{{$value->name}}</h6>
                        <div class="reviews-group d-flex">
                          @for($i=1; $i<=$value->rating;$i++)
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                          @endfor
                        </div>
                      </div>
                      <div class="review-date">{{date('D M Y',strtotime($value->created_at))}}</div>
                      <div class="review-text">
                        <p>{{$value->review}}</p>
                      </div>
                      <div class="product-single__media" data-media-type="grid-image">
                        <div class="product-single__image">
                          
                          
              
                            @php
                            $img = explode(',', $value->image);
                            $i = 0;
                            $j = 0;
                              @endphp
                           
                            @if(count($img)>1)
                            @foreach($img as $key1=>$value1)
                              <div class="product-single__image-item">
                                <a href="{{$value1}}" target="_blank"><img loading="lazy" class="h-auto" src="{{$value1}}" width="50" height="50" alt=""></a>
                              </div>
                            @php
                              $j++;
                            @endphp
                            @endforeach
                            @endif
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
                @if(Auth::user())
                <div class="product-single__review-form">
                  <form id="review_form">
                    <h5>Be the first to review “{{$product->name}}”</h5>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="select-star-rating">
                      <label>Your rating *</label>
                      <span class="star-rating">
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                        </svg>
                        <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                        </svg>
                      </span>
                      <input type="hidden" id="form-input-rating" name="rating" value="">
                      <input type="hidden"  name="product_id"  value="{{$product->id}}">
                    </div>
                    <div class="mb-4">
                      <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Your Review" cols="30" name="review" rows="8"></textarea>
                    </div>
                    <div class="mb-4">
                      <input type="file"  name="image[]" multiple accept=".jpg,.png ,.jpeg">
                    </div>
                    <div class="form-action">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                @endif
                
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h5 class="accordion-header" id="accordion-heading-3a">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3a" aria-expanded="false" aria-controls="accordion-collapse-3a">
                Composition And Care
                <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
              </button>
            </h5>
            <div id="accordion-collapse-3a" class="accordion-collapse collapse" aria-labelledby="accordion-heading-3a" data-bs-parent="#product_single_details_accordion">
              <div class="accordion-body">
                <div class="delivery-modal__wrapper">
                  <div class="d-flex align-items-center justify-content-between">
                    <h6>Next day delivery in store</h6>
                    <span class="third-color">FREE</span>
                  </div>
                  <p>Buy before 6pm to receive your order next day.</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6>Next day delivery</h6>
                    <span>4 INR</span>
                  </div>
                  <p>Orders before 6pm from Monday to Saturday (or before 1pm on Sunday) will be delivered Next working day (except Northern Ireland and Highlands).<br>Orders placed after 6pm (after 1pm on Sunday) or for Northern Ireland and Highlands will be delivered in 2 working days.</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6>Drop Point</h6>
                    <span>8 INR</span>
                  </div>
                  <p>In 2-3 working days. Pick up your parcel in one of the many different collection points available and during a wide range of hours.</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6>Same day delivery in Ayodhya:</h6>
                    <span>9 INR</span>
                  </div>
                  <p>Place your order before 13:00 to get it today!.<br>If you order later on, you’ll receive it the next day and if you order on Sunday, you’ll receive it the next working day.</p>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="products-carousel container">
    <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>

    <div id="related_products" class="position-relative">
      <div class="swiper-container js-swiper-slider"
        data-settings='{
          "autoplay": false,
          "slidesPerView": 4,
          "slidesPerGroup": 4,
          "effect": "none",
          "loop": true,
          "pagination": {
            "el": "#related_products .products-pagination",
            "type": "bullets",
            "clickable": true
          },
          "navigation": {
            "nextEl": "#related_products .products-carousel__next",
            "prevEl": "#related_products .products-carousel__prev"
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "slidesPerGroup": 2,
              "spaceBetween": 14
            },
            "768": {
              "slidesPerView": 3,
              "slidesPerGroup": 3,
              "spaceBetween": 24
            },
            "992": {
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "spaceBetween": 30
            }
          }
        }'>
        <div class="swiper-wrapper">
          @if(!empty($related_product) and count($related_product) !=0)
          @foreach($related_product as $key=>$value)

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="{{route('product_detail',['product'=>$value->id])}}">
                <img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                <img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                </a>
                <button onclick="add_cart({{$value->id}})" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                <button style="bottom: -2.375rem;text-align: justify;width: 55%;border-top-right-radius: 79%;left: 0px;" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart"><span class="money price" style="font-weight:600"><del style="font-weight:300;padding-right:20px">&#8377;{{$value->mrp}}</del>&#8377;{{$value->price}}</span></button>
              </div>
        
              <div class="pc__info position-relative">
                <h6 class="pc__title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h6>
                <div class="product-card__price d-flex">
                {{-- <span class="money price">&#8377;  {{$value->price}}</span> --}}
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                </div>

                <div class="product-single__swatches">
                  <div class="product-swatch color-swatches">
                    <label>Color</label>
                    <div class="swatch-list">
                      <input type="radio" name="color" id="swatch-11">
                      <label class="swatch swatch-color js-swatch" for="swatch-11" aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" style="color: #222"></label>
                      <input type="radio" name="color" id="swatch-12" checked>
                      <label class="swatch swatch-color js-swatch" for="swatch-12" aria-label="Red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red" style="color: #C93A3E"></label>
                      <input type="radio" name="color" id="swatch-13">
                      <label class="swatch swatch-color js-swatch" for="swatch-13" aria-label="Grey" data-bs-toggle="tooltip" data-bs-placement="top" title="Grey" style="color: #E4E4E4"></label>
                    </div>
                  </div>
                </div>

                @if(Auth::user())
                <button onclick="add_wishlist({{$value->id}})" class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
                @endif
              </div>
              </div>
          @endforeach
          @endif
        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
      </div><!-- /.products-carousel__prev -->
      <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
      </div><!-- /.products-carousel__next -->

      <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->

  </section><!-- /.products-carousel container -->
</main>




@endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script type="text/javascript"> $(document).ready(function(){
$(".small_img").hover (function(){
$(".big_img").attr('src', $(this).attr('src'));
});
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#imgs').imagezoomsl({
			zoomrange:[3,3]
		});
	});
	function bigImg(obj){
		console.log(obj);
	}
</script>
@endsection