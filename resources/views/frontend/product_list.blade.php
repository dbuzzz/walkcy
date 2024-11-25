{{-- @extends('frontend.layout')
@section('extern-css')
 
@endsection
@section('content')

<div class="mb-5 pb-xl-5"></div><div class="mb-5 pb-xl-5"></div>
<main>
  <section class="category-carousel container">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

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

  <div class="mb-4 pb-lg-3"></div>

  <section class="shop-main container">
    <div class="d-flex justify-content-between mb-4 pb-md-2">
      <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
        <a href="javascript:void[0]" class="menu-link menu-link_us-s text-uppercase fw-medium" >Home</a>
        <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
        <a href="javascript:void[0]" class="menu-link menu-link_us-s text-uppercase fw-medium" >Shop</a>
      </div><!-- /.breadcrumb -->

    </div><!-- /.d-flex justify-content-between -->

    <div class="products-grid row row-cols-2 row-cols-md-3 row-cols-lg-4" id="products-grid" >
      @if(!empty($product_list))
      @foreach($product_list as $key=>$value)             
      <div class="product-card-wrapper">
        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
          <div class="pc__img-wrapper">
            <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="{{route('product_detail',['product'=>$value->id])}}"><img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                </div><!-- /.pc__img-wrapper -->
                <div class="swiper-slide">
                  <a href="{{route('product_detail',['product'=>$value->id])}}"><img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="{{$value->name}}" class="pc__img"></a>
                </div><!-- /.pc__img-wrapper -->
              </div>
              <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></span>
              <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></span>
            </div>
            <button onclick="add_cart({{$value->id}})" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
          </div>

          <div class="pc__info position-relative">
            <h6 class="pc__title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h6>
            <div class="product-card__price d-flex">
              <span class="money price price-old">&#8377;  {{$value->mrp}}</span>
              <span class="money price price-sale">&#8377;  {{$value->price}}</span>
            </div>

            @if(Auth::user())
                <button onclick="add_wishlist({{$value->id}})" class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
            @endif

           
          </div>
        </div>
      </div>

      @endforeach
      @endif

      
    </div><!-- /.products-grid row -->

    <div class="text-center">
      @php
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					}else{
						$page = 1;
					}
					@endphp
					<div class="row mt-15 mb-30">
						<div class="col-12 text-center">
							<div class="fr-pagination">
								<ul class="pagination">
										
										@for($j = 1 ; $j <= ceil($count/10) ; $j++ )
										<li class="page-item {{($page==$j)?'active':''}}"><a class="page-link" href="{{route('product_list',['page' => $j,'sort' => @$sort])}}">{{$j}}</a></li>
										@endfor
										
									</ul>

									
							</div>
						</div>
					</div>
    </div>
  </section><!-- /.shop-main container -->
</main>

@endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection --}}

@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

 
@endsection
@section('content')
<div class="mb-5 pb-xl-5"></div>
<div class="mb-5 pb-xl-5"></div>
<main>
    <section class="shop-main container d-flex pt-4 pt-xl-5">
      <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
        <div class="aside-header d-flex d-lg-none align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div><!-- /.aside-header -->

        <div class="pt-4 pt-lg-0"></div>

        <div class="accordion" id="categories-list">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-11">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
                Product Categories
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-1" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-11" data-bs-parent="#categories-list">
              <div class="accordion-body px-0 pb-0 pt-3">
                <ul class="list list-inline mb-0">
                  

				    @if(!empty($home_category))
					@foreach($home_category as $key=>$value)
						<li class="list-item"  <?php echo (!empty($selectedCategory) && in_array($value->id,$selectedCategory)?'style="background-color:#0000003b;margin: 3px;"':'')?>>
							<a href="javascript:void[0]" class="menu-link py-1" data-id="{{@$value->id}}" onclick="addCategory(this)">{{$value->name}}</a>
						  </li>
					@endforeach
					@endif
                 
                </ul>
              </div>
            </div>
          </div><!-- /.accordion-item -->
        </div><!-- /.accordion-item -->

		<div class="accordion" id="brand-list">
			<div class="accordion-item mb-4 pb-3">
			  <h5 class="accordion-header" id="accordion-heading-11a">
				<button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-1a" aria-expanded="true" aria-controls="accordion-filter-1a">
				  Brands
				  <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
					<g aria-hidden="true" stroke="none" fill-rule="evenodd">
					  <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
					</g>
				  </svg>
				</button>
			  </h5>
			  <div id="accordion-filter-1a" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-11a" data-bs-parent="#brand-list">
				<div class="accordion-body px-0 pb-0 pt-3">
				  <ul class="list list-inline mb-0">
					
  
					  @if(!empty($home_brand))
					  @foreach($home_brand as $key=>$value)
						  <li class="list-item" <?php echo (!empty($selectedBrand) && in_array($value->id,$selectedBrand)?'style="background-color:#0000003b;margin: 3px;"':'')?>>
							  <a href="javascript:void[0]" class="menu-link py-1" data-id="{{@$value->id}}" onclick="addBrand(this)">{{$value->name}}</a>
							</li>
					  @endforeach
					  @endif
				   
				  </ul>
				</div>
			  </div>
			</div><!-- /.accordion-item -->
		  </div>


        <div class="accordion" id="color-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true" aria-controls="accordion-filter-2">
                Color
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-2" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-1" data-bs-parent="#color-filters">
              <div class="accordion-body px-0 pb-0">
                <div class="d-flex flex-wrap">
					@if(!empty($color))
					@foreach($color as $key=>$value)
						<a href="javascript:void[0]" class="swatch-color js-filter <?php echo (!empty($selectedColor) && in_array($value->color,$selectedColor)?'swatch_active':'')?>" style="color: {{$value->color}}" data-id="{{@$value->color}}" onclick="addColor(this)"></a>
					@endforeach
					@endif
                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->
        </div><!-- /.accordion -->


        <div class="accordion" id="size-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-size">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true" aria-controls="accordion-filter-size">
                Sizes
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-size" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
              <div class="accordion-body px-0 pb-0">
                <div class="d-flex flex-wrap">
					@if(!empty($size))
					@foreach($size as $key=>$value)
						<a href="javascript:void[0]"  class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter <?php echo (!empty($selectedVariant) && in_array($value->variant,$selectedVariant)?'swatch_active':'')?>" data-id="{{@$value->variant}}" onclick="addSize(this)">{{$value->variant}}</a>
					@endforeach
					@endif
                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->
        </div><!-- /.accordion -->

        <div class="accordion" id="price-filters">
          <div class="accordion-item mb-4">
            <h5 class="accordion-header mb-2" id="accordion-heading-price">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true" aria-controls="accordion-filter-price">
                Price
                <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                  <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                    <path d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z"/>
                  </g>
                </svg>
              </button>
            </h5>
            <div id="accordion-filter-price" class="accordion-collapse collapse show border-0" aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
              <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="100" data-slider-max="10000" data-slider-step="5" data-slider-value="{{((count($selectedPrice)>1)?'['.$selectedPrice[0].','.$selectedPrice[1].']':'[250,2000]')}}" data-currency="&#8377; " onchange="addPrice(this)">
              <div class="price-range__info d-flex align-items-center mt-2">
                <div class="me-auto">
                  <span class="text-secondary">Min Price: </span>
                  <span class="price-range__min">&#8377; {{((count($selectedPrice)>1)?$selectedPrice[0]:'250')}}</span>
                </div>
                <div>
                  <span class="text-secondary">Max Price: </span>
                  <span class="price-range__max">&#8377; {{((count($selectedPrice)>1)?$selectedPrice[1]:'2000')}}</span>
                </div>
              </div>
            </div>
          </div><!-- /.accordion-item -->
        </div><!-- /.accordion -->

		<div>
			<form action="{{url('product-list')}}" method="GET">
				<input type="hidden" value="{{((count($selectedCategory)>0)?implode(',',$selectedCategory):'')}}" id="addCategory" name="addCategory">
				<input type="hidden" value="{{((count($selectedBrand)>0)?implode(',',$selectedBrand):'')}}" id="addBrand" name="addBrand">
				<input type="hidden" value="{{((count($selectedColor)>0)?implode(',',$selectedColor):'')}}" id="addColor" name="addColor">
				<input type="hidden" value="{{((count($selectedVariant)>0)?implode(',',$selectedVariant):'')}}" id="addVariant" name="addVariant">
				<input type="hidden" value=" {{((count($selectedPrice)>1)?$selectedPrice[0].','.$selectedPrice[1]:'250,2000')}}" id="addPrice" name="addPrice">
				<button type="submit" class="btn btn-info"> Filter</button>
			</form>
		</div>
      </div><!-- /.shop-sidebar -->

      <div class="shop-list flex-grow-1">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="{{url('/')}}" class="menu-link menu-link_us-s text-uppercase fw-medium" >Home</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="javascript:void[0]" class="menu-link menu-link_us-s text-uppercase fw-medium" >Shop</a>
          </div><!-- /.breadcrumb -->

          <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
            {{-- <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items" name="total-number">
              <option selected>Default Sorting</option>
              <option value="1">Featured</option>
              <option value="2">Best selling</option>
              <option value="3">Alphabetically, A-Z</option>
              <option value="3">Alphabetically, Z-A</option>
              <option value="3">Price, low to high</option>
              <option value="3">Price, high to low</option>
              <option value="3">Date, old to new</option>
              <option value="3">Date, new to old</option>
            </select> --}}

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            {{-- <div class="col-size align-items-center order-1 d-none d-lg-flex">
              <span class="text-uppercase fw-medium me-2">View</span>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
              <button class="btn-link fw-medium js-cols-size" data-target="products-grid"  data-cols="4">4</button>
            </div><!-- /.col-size --> --}}

            <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
              <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_filter" /></svg>
              <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
              </button>
            </div><!-- /.col-size d-flex align-items-center ms-auto ms-md-3 -->
          </div><!-- /.shop-acs -->
        </div><!-- /.d-flex justify-content-between -->

        <div class="products-grid row row-cols-2" id="products-grid" >
          @if(!empty($product_list))
          @foreach($product_list as $key=>$value)             
          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="{{route('product_detail',['product'=>$value->id])}}"><img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div><!-- /.pc__img-wrapper -->
                    <div class="swiper-slide">
                      <a href="{{route('product_detail',['product'=>$value->id])}}"><img loading="lazy" src="{{$value->image}}" width="330" height="400" alt="{{$value->name}}" class="pc__img"></a>
                    </div><!-- /.pc__img-wrapper -->
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_sm" /></svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_sm" /></svg></span>
                </div>
                <button onclick="add_cart({{$value->id}})" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>

                <button style="bottom: -2.375rem;text-align: justify;width: 55%;border-top-right-radius: 79%;left: 0px;" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart"><span class="money price" style="font-weight:600"><del style="font-weight:300;padding-right:20px">&#8377;{{$value->mrp}}</del>&#8377;{{$value->price}}</span></button>
              </div>

              <div class="pc__info position-relative">
                <h6 class="pc__title"><a href="{{route('product_detail',['product'=>$value->id])}}">{{$value->name}}</a></h6>
                <div class="product-card__price d-flex">
                  {{-- <span class="money price price-old">&#8377;  {{$value->mrp}}</span>
                  <span class="money price price-sale">&#8377;  {{$value->price}}</span> --}}
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
          </div>

          @endforeach
          @endif
        </div><!-- /.products-grid row -->

        <div class="text-center">
          @php
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }else{
                $page = 1;
              }
              @endphp
              <div class="row mt-15 mb-30">
                <div class="col-12 text-center">
                  <div class="fr-pagination">
                    <ul class="pagination">
                        
                        @for($j = 1 ; $j <= ceil($count/10) ; $j++ )
                        <li class="page-item {{($page==$j)?'active':''}}"><a class="page-link" href="{{route('product_list',['page' => $j,'sort' => @$sort])}}">{{$j}}</a></li>
                        @endfor
                        
                      </ul>
    
                      
                  </div>
                </div>
              </div>
        </div>
      </div>
    </section><!-- /.shop-main container -->
  </main>



@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
{{-- <script type="text/javascript"> $(document).ready(function(){
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
</script> --}}

<script>
	category = [];
	function addCategory(obj){
		$(obj).parent().attr('style','background-color:#0000003b;margin: 3px;')
		category.push($(obj).attr('data-id'))
		$('#addCategory').val(category.join(','));
	}
	brand = [];
	function addBrand(obj){
		$(obj).parent().attr('style','background-color:#0000003b;margin: 3px;')
		brand.push($(obj).attr('data-id'))
		$('#addBrand').val(brand.join(','));
		console.log(brand);
	}
	color = [];
	function addColor(obj){
		color.push($(obj).attr('data-id'))
		$('#addColor').val(color.join(','));
		console.log(color);
	}
	size = [];
	function addSize(obj){
		size.push($(obj).attr('data-id'))
		$('#addVariant').val(size.join(','));
		console.log(size);
	}
	function addPrice(obj){
		$('#addPrice').val($(obj).val());
	}
</script>
@endsection