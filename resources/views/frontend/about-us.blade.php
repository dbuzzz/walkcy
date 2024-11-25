@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

 
@endsection
@section('content')

<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<main>
    {{-- <div class="mb-4 pb-4"></div> --}}
    <section class="about-us container" style=" max-width: 100%; ">
      {{-- <div class="mw-930">
        <h2 class="page-title">ABOUT Walkcy</h2>
      </div> --}}
      <div class="about-us__content pb-5 mb-5">
        <p class="mb-5">
          <img loading="lazy" class="w-100 h-auto d-block" src="https://vessi.com/cdn/shop/files/banner-story.jpg?v=1613780438&width=1440" style=" height: 242px !important; ">
        </p>
        <div class="mw-930">
          <h2 class="mb-4 text-center pb-4" style=" font-weight: 700; ">An Every Day, Anywhere Kind Of Sneaker.
          </h2>
          <h4 class="mb-4 text-center pb-4" style=" font-weight: 700; ">RAIN. SNOW. SLUSH. MUD. LIFE.
          </h4>
          <p class="fs-6 mb-4 text-center pb-4">Gone are the days of a shoe for this and a shoe for that. We believe that you shouldn’t have to settle when it comes to your sneakers, so we created a shoe that can be worn all day, every day, in any weather. Wear them in the snow, wear them in rain, wear them in the sun, even wear them in the shower because sneakers that can do it all are a thing now.</p>
         
        </div>
        <div class="mw-930 d-lg-flex align-items-lg-center">
          <div style=" margin-top: -346px; width: 75vw; padding: 54px; position: absolute; background: #80808045; z-index: -1; "></div>
          <div class="image-wrapper col-lg-6">
            <img class="h-auto px-4" loading="lazy" src="https://vessi.com/cdn/shop/files/Vessi_Heather-5198_1.jpg?v=1613793819&width=824" width="450" height="500" alt="" style=" border-radius: 16%; ">
          </div>
          <div class="content-wrapper col-lg-6 px-lg-4 py-5">
            <h4 class="mb-3 text-center" style=" font-weight: 700; ">Where We're Going
            </h4>
            <h6 class="mb-3 text-center" style=" font-weight: 700; ">TOES CROSSED.
            </h6>
            <p class="text-center">We might be here now, but this isn’t where we’ll end up. At Vessi, we’re on the move towards a better tomorrow. Come along for the ride as we continue to innovate and rethink what a shoe should be.

            </p>
          </div>
        </div>

        <div class="mw-930 d-lg-flex align-items-lg-center">
          <div style=" margin-top: -346px; width: 75vw; padding: 54px; position: absolute; background: #80808045; z-index: -1; right:32rem "></div>
          <div class="content-wrapper col-lg-6 px-lg-4">
            <h4 class="mb-3 text-center" style=" font-weight: 700; ">Meet The founders</h4>
            <h6 class="mb-3 text-center" style=" font-weight: 700; ">ALL THREE OF THEM.</h6>
            <p class="text-center">Simply put, we’re three Vancouverites who had it with the rainy weather. In 2018, we set-out to create a totally waterproof sneaker that not only kept our socks dry, but kept our feet sweat-free, comfortable, looked stylish and was good to the earth. Through innovation, a little ingenuity and thousands of kms clocked, Vessi was born (and puddles have never been the same).

              Although our journey started out with the problem of rain-soaked socks, what we ended up with is a sneaker worth taking everywhere. Whether it’s a sunny day or a stormy one, you’re at home, headed to work or visiting someplace new, in a pair of Vessis you’re always ready for anything.</p>
          </div>

          <div class="image-wrapper col-lg-6">
            <img class="h-auto px-4" loading="lazy" src="https://vessi.com/cdn/shop/files/the-vessi-founders.jpg?v=1613780438&width=1000" width="450" height="500" alt="" style=" border-radius: 16%; ">
          </div>
          
        </div>
      </div>
    </section>
    
    <section class="service-promotion horizontal container mw-930 pt-0 mb-md-4 pb-md-4 mb-xl-5">
      <div class="row">
        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shipping" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">Fast And Free Delivery</h3>
          <p class="service-promotion__content text-secondary">Free delivery for all orders over $140</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_headphone" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">24/7 Customer Support</h3>
          <p class="service-promotion__content text-secondary">Friendly 24/7 customer support</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shield" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">Money Back Guarantee</h3>
          <p class="service-promotion__content text-secondary">We return money within 30 days</p>
        </div><!-- /.col-md-4 text-center-->
      </div><!-- /.row -->
    </section>

    {{-- <section class="brands-carousel container mw-930">
      <h5 class="mb-3 mb-xl-5">Company Partners</h5>
      <div class="position-relative">
        <div class="swiper-container js-swiper-slider"
          data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 5,
            "slidesPerGroup": 1,
            "effect": "none",
            "loop": true,
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
                "slidesPerGroup": 1,
                "spaceBetween": 30,
                "pagination": false
              },
              "1200": {
                "slidesPerView": 5,
                "slidesPerGroup": 1,
                "spaceBetween": 30,
                "pagination": false
              }
            }
          }'>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand1.png" width="120" height="20" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand2.png" width="87" height="20" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand3.png" width="132" height="22" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand4.png" width="72" height="21" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand5.png" width="123" height="31" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand6.png" width="137" height="22" alt="">
            </div>
            <div class="swiper-slide">
              <img loading="lazy" src="{{asset('')}}frontend_assets/images/brands/brand7.png" width="94" height="21" alt="">
            </div>
          </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->
      </div><!-- /.position-relative -->

    </section> --}}
  </main>


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>

@endsection