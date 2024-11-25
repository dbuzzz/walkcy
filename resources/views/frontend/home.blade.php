{{-- @extends('frontend.layout')
@section('extern-css')
 
@endsection
@section('content')

<main>
        <!-- hero slider section start -->
        <section class="hero-slider">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                            <!-- single slider item start -->
                            @if(!empty($home_page))
							@foreach($home_page as $key=>$value)
                            <div class="hero-single-slide">
                                <div class="hero-slider-item bg-img" data-bg="{{$value->banner}}">
                                    <div class="hero-slider-content slide-1">
                                       
                                        <h2 class="slide-title">{{@$value->heading}}</h2>
                                        <p class="slide-desc">{{@$value->sub_heading}}</p>
                                       
                                    </div>
                                </div>
                            </div>
                            @endforeach
							@endif

                                                      
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero slider section end -->

        <!-- service features start -->
        <section class="service-policy-area">
            <div class="container">
                <div class="row">
                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-1">
                            <div class="policy-icon">
                                <img src="{{asset('')}}frontend_assets/img/icon/policy-1.png" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">FREE SHIPPING</h5>
                                <p class="policy-desc">Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->

                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-2">
                            <div class="policy-icon">
                                <img src="{{asset('')}}frontend_assets/img/icon/policy-2.png" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">ONLINE SUPPORT</h5>
                                <p class="policy-desc">Online support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->

                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-3">
                            <div class="policy-icon">
                                <img src="{{asset('')}}frontend_assets/img/icon/policy-3.png" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">MONEY RETURN</h5>
                                <p class="policy-desc">Back guarantee under 5 days</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->
                </div>
            </div>
        </section>
        <!-- service features end -->

        <!-- our product area start -->
        <section class="our-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Best Seller</h2>
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                            <!-- product single item start -->
                            

                            @if(!empty($best_selling_prod) and count($best_selling_prod) !=0)
						@foreach($best_selling_prod as $key=>$value)
						

						<div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="{{route('product_detail',['product'=>$value->id])}}">
											<img style=" width: 100px; " src="{{$value->image}}" alt="img">
										</a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">{{$value->price}}</span>
                                        <span class="price-old"><del>{{$value->mrp}}</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="javascript:void(0)" onclick="add_wishlist({{$value->id}})" data-bs-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="javascript:void(0)" onclick="add_cart({{$value->id}})" data-bs-toggle="tooltip" title="Add To Cart"><i class="ion-bag"></i></a>
                                     
                                    </div>
                                </div>
                            </div>
						@endforeach
						@endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Latest Products</h2>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                            <!-- product single item start -->
                            

                            @if(!empty($new_prod) and count($new_prod) !=0)
						@foreach($new_prod as $key=>$value)
						

						<div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="{{route('product_detail',['product'=>$value->id])}}">
											<img style=" width: 100px; " src="{{$value->image}}" alt="img">
										</a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">{{$value->price}}</span>
                                        <span class="price-old"><del>{{$value->mrp}}</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="javascript:void(0)" onclick="add_wishlist({{$value->id}})" data-bs-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="javascript:void(0)" onclick="add_cart({{$value->id}})" data-bs-toggle="tooltip" title="Add To Cart"><i class="ion-bag"></i></a>
                                      
                                    </div>
                                </div>
                            </div>
						@endforeach
						@endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our product area end -->

        <!-- banner statistic area start -->
        <div class="banner-statistics">
            <div class="container">
                <div class="row g-0 mtn-30">
                    <div class="col-md-6">
                        <div class="img-container mt-30">
                            <a class="d-block" href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id1])}}">
                                <img class="w-100" src="{{@$HomeBanner->banner1}}" alt="banner-image">
                            </a>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-container mt-30">
                            <a class="d-block" href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id1])}}">
                                <img class="w-100" src="{{@$HomeBanner->banner2}}" alt="banner-image">
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistic area end -->

        <!-- top seller area start -->
        <section class="top-seller-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Best Selling</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="product-banner">
                            <a href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id3])}}">
                                <img src="{{@$HomeBanner->banner3}}" alt="product banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="top-seller-carousel slick-row-15 mtn-30">
                            <!-- product item start -->
                            @if(!empty($best_selling_prod) and count($best_selling_prod) !=0)
							@foreach($best_selling_prod as $key=>$value)
                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('product_detail',['product'=>$value->id])}}">
                                            <img src="{{$value->image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">&#8377; {{$value->price}}</span>
                                            <span class="price-old"><del>{{$value->mrp}}</del></span>
                                        </div>
                                        
                                        <div class="product-link-2">
                                        	@if(Auth::user())
                                            <a href="javascript:void(0)" onclick="add_wishlist({{$value->id}})" data-bs-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            @endif
                                            <a href="javascript:void(0)" onclick="add_cart({{$value->id}})" data-bs-toggle="tooltip" title="Add To Cart"><i class="ion-bag"></i></a>
                                          
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
        </section>
        <!-- top seller area end -->

        <!-- brand area start -->
      
        <!-- brand area end -->
    </main>


@endsection
@section('extern-js')

<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection --}}
@extends('frontend.layout')
@section('extern-css')
 <style>
  @media (max-width: 768px) {
    .slideshow {
        height: 13.5rem;
    }
}
 </style>
@endsection
@section('content')

<div class="modal fade" id="newsletterPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-0 m-0">
          <div class="col-md-6 p-0 d-none d-md-block">
            <div class="newsletter-popup__bg h-100 w-100">
              <img loading="lazy" src="{{@$HomeBanner->banner4}}" class="h-100 w-100 object-fit-cover d-block" alt="">
            </div>
          </div>
          <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="block-newsletter w-100">
              <h3 class="block__title">Sign Up to Our Newsletter</h3>
              <p>Be the first to get the latest news about trends, promotions, and much more!</p>
              <form id="newslatter" class="footer-newsletter__form position-relative bg-body">
                <input class="form-control border-2" type="email" name="email" placeholder="Your email address">
                <input class="btn-link fw-medium bg-transparent position-absolute top-0 end-0 h-100" type="submit" value="JOIN">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<main>
    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow h-xs-25rem"
      data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      <div class="swiper-wrapper">

		@if(!empty($home_page))
		@foreach($home_page as $key=>$value)
		<div class="swiper-slide">
      <a href="{{route('product_list',['cat_id'=>@$value->cat_id])}}">
			<div class="overflow-hidden position-relative h-100">
				<div class="slideshow-character position-absolute bottom-0 pos_right-center">
				<img loading="lazy" src="{{$value->banner}}" width="542" height="733" alt="Woman Fashion 1" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto">
				<div class="character_markup type2">
					{{-- <p class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">Shoes</p> --}}
				</div>
				</div>
				<div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
				{{-- <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">New Arrivals</h6>
				<h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">{{@$value->heading}}</h2>
				<h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">{{@$value->sub_heading}}</h2>
				<a href="{{route('product_list',['cat_id'=>@$value->cat_id])}}" class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop Now</a> --}}
				</div>
			</div>
    </a>
		</div>
		@endforeach
		@endif
        

      </div><!-- /.slideshow-wrapper js-swiper-slider -->

      <div class="container">
        <div class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
        <!-- /.products-pagination -->
      </div><!-- /.container -->
    </section><!-- /.slideshow -->

    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      <section class="category-carousel container">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Categories</h2>
  
        <div class="position-relative">
          <div class="swiper-container js-swiper-slider"
            data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>
            <div class="swiper-wrapper">

				@if(!empty($home_category))
				@foreach($home_category as $key=>$value)
				<div class="swiper-slide">
					<img loading="lazy" class="w-100 h-auto mb-3" src="{{$value->image}}" width="124" height="124" alt="">
					<div class="text-center">
						<a href="{{route('product_list',['cat_id'=>@$value->id])}}" class="menu-link fw-medium">{{$value->name}}</a>
					</div>
				</div>
				@endforeach
				@endif
             
            </div><!-- /.swiper-wrapper -->
          </div><!-- /.swiper-container js-swiper-slider -->
    
          <div class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
          </div><!-- /.products-carousel__prev -->
          <div class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
            <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
          </div><!-- /.products-carousel__next -->
        </div><!-- /.position-relative -->
      </section>

	  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


	  <section class="products-carousel container">
		<h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4 mt-4">Products</h2>
  
		
		

		{{-- <div class="product-item mb-50">
				<div class="product-thumb">
					<a href="{{route('product_detail',['product'=>$value->id])}}">
							<img style=" width: 100px; " src="{{$value->image}}" alt="img">
						</a>
				</div>
				<div class="product-content">
					<h5 class="product-name">
						<a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a>
					</h5>
					<div class="price-box">
						<span class="price-regular">{{$value->price}}</span>
						<span class="price-old"><del>{{$value->mrp}}</del></span>
					</div>
					<div class="product-action-link">
						<a href="javascript:void(0)" onclick="add_wishlist({{$value->id}})" data-bs-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
						<a href="javascript:void(0)" onclick="add_cart({{$value->id}})" data-bs-toggle="tooltip" title="Add To Cart"><i class="ion-bag"></i></a>
						
					</div>
				</div>
			</div> --}}

			<div class="tab-content pt-2" id="collections-tab-content">
				<div class="tab-pane fade active show" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">
				  <div class="row">
				      @if(!empty($best_selling_prod) and count($best_selling_prod) !=0)
		@foreach($best_selling_prod as $key=>$value)
					<div class="col-6 col-md-4 col-lg-3">
					  <div class="product-card mb-3 mb-md-4 mb-xxl-5">
						<div class="pc__img-wrapper">
						  <a href="{{route('product_detail',['product'=>$value->id])}}">
							<img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
							<img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
						  </a>
						  <div class="anim_appear-bottom position-absolute w-100 text-center mb-3">
							<button onclick="add_cart({{$value->id}})" class="btn btn-round btn-hover-red border-0 text-uppercase me-1 me-md-2 js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">
							  <svg class="d-inline-block" width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_cart"></use></svg>
							</button>
							{{-- <button class="btn btn-round btn-hover-red border-0 text-uppercase me-1 me-md-2 js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
							  <svg class="d-inline-block" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><use href="#icon_view"></use></svg>
							</button> --}}
							<button onclick="add_wishlist({{$value->id}})" class="btn btn-round btn-hover-red border-0 text-uppercase js-add-wishlist" title="Add To Wishlist">
							  <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart"></use></svg>
							</button>

              
              <button style="bottom: -2.375rem;text-align: justify;width: 55%;border-top-right-radius: 79%;left: 0px;" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart"><span class="money price" style="font-weight:600"><del style="font-weight:300;padding-right:20px">&#8377;{{$value->mrp}}</del>&#8377;{{$value->price}}</span></button>
						  </div>
						</div>
		
						<div class="pc__info position-relative">
						  {{-- <p class="pc__category">Dresses</p> --}}
						  <h6 class="pc__title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h6>
						  <div class="product-card__price d-flex text-center pt-2">
							{{-- <span class="money price" style="font-weight:600"><del style="font-weight:300;padding-right:10px">&#8377;{{$value->mrp}}</del>&#8377;{{$value->price}}</span> --}}
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
						  </div>
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
            
					  </div>
					</div>
						@endforeach
		@endif
				  </div><!-- /.row -->
				  <div class="text-center mt-2">
					<a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">See All Products</a>
				  </div>
				</div><!-- /.tab-pane fade show-->
				
			  </div>
	
	  </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

      <section class="category-banner container">
        <div class="row">
          <div class="col-md-4">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto" src="{{@$HomeBanner->banner1}}" width="690" height="665" alt="">
              {{-- <div class="category-banner__item-mark">
                Starting at $19
              </div> --}}
              <div class="category-banner__item-content">
                <h3 class="mb-0">{{@$HomeBanner->cat1}}</h3>
                <a href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id1])}}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto" src="{{@$HomeBanner->banner2}}" width="690" height="665" alt="">
              {{-- <div class="category-banner__item-mark">
                Starting at $19
              </div> --}}
              <div class="category-banner__item-content">
                <h3 class="mb-0">{{@$HomeBanner->cat2}}</h3>
                <a href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id2])}}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="category-banner__item border-radius-10 mb-5">
              <img loading="lazy" class="h-auto" src="{{@$HomeBanner->banner3}}" width="690" height="665" alt="">
              {{-- <div class="category-banner__item-mark">
                Starting at $19
              </div> --}}
              <div class="category-banner__item-content">
                <h3 class="mb-0">{{@$HomeBanner->cat3}}</h3>
                <a href="{{route('product_list',['cat_id'=>@$HomeBanner->cat_id3])}}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div>
            </div>
          </div>
		
        </div>
      </section>

      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

     
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    
    <section class="instagram px-1 position-relative">
      {{-- <h2 class="d-none">Instagram</h2> --}}
      <div class="row row-cols-2 row-cols-md-4 row-cols-xl-8">
        @if(!empty($BrandPartner))
				@foreach($BrandPartner as $key=>$value)
          <div class="instagram__tile">
            <a href="#" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
              <img loading="lazy" class="instagram__img" src="{{$value->image}}" width="232" height="232" alt="Insta image 5">
            </a>
          </div>
				@endforeach
				@endif
      </div>
      
    </section><!-- /.instagram container -->
  </main>

@endsection
@section('extern-js')

<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection