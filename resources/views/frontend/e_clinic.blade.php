@extends('frontend.layout')
@section('extern-css')

    <!-- CSS -->
    <link href="{{asset('')}}frontend_assets/doctor/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('')}}frontend_assets/doctor/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('')}}frontend_assets/doctor/css/owl.theme.default.min.css">
    <link href="{{asset('')}}frontend_assets/doctor/css/style.css" rel="stylesheet">
 
@endsection
@section('content')
<section class="position-relative">
        <div class="container position-relative ">
            <div class="align-items-center rv-welcom-section">
                <!-- <div class="col-12 col-md-8 col-lg-8"> -->
                <div class="rv-welcome-text ">
                    <div class="text-lg-start rv-heading-main">
                        <!-- Heading -->
                        <h1 class="rv-heading">
                            we provide comprehensive <br/> <span>health care services</span>
                        </h1>
                        <!-- Text -->
                        <p class="rv-sub-text">
                            Vitae neque, tortor, orci in tincidunt dui tincidunt sed eget. Enim commodo, Tellus proin duis gravida in cursus quam sit felis, odio.
                        </p>
                    </div>
                    <form>
                        <div class="rv-book-appointment">
                            <div class="rv-top-ba">
                                <span class="title">Book an appointment</span>
                                {{-- <button type="button" class="btn rv-btn">Book Now</button> --}}
                                <a href="{{url('/doctor_list')}}" class="btn rv-btn">Book Now</a>
                            </div>
                            <div class="rv-ba-details">
                                <div class="rv-ad">
                                    <div class="rv-icon">
                                        <img src="{{asset('')}}frontend_assets/doctor/img/profile.png" />
                                    </div>
                                    <div class="rv-details">
                                        <span class="rv-line1">Full Name</span>
                                        <span class="rv-line2">
                                            <input type="text"/>
                                        </span>
                                    </div>
                                </div>

                                <div class="rv-ad">
                                    <div class="rv-icon">
                                        <img src="{{asset('')}}frontend_assets/doctor/img/date.png" />
                                    </div>
                                    <div class="rv-details">
                                        <span class="rv-line1">Appointment Date</span>
                                        <span class="rv-line2">
                                            <input type="date"/>
                                        </span>
                                    </div>
                                </div>

                                <div class="rv-ad">
                                    <div class="rv-icon">
                                        <img src="{{asset('')}}frontend_assets/doctor/img/call.png" />
                                    </div>
                                    <div class="rv-details">
                                        <span class="rv-line1">Contact Number</span>
                                        <span class="rv-line2">
                                            <input type="tel"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <!-- </div> -->
                <div class="d-none d-sm-block rv-welcom-img"> <img class="rv-main-img" src="{{asset('')}}frontend_assets/doctor/img/main.svg"> </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>
    <!-- how can i help you-->
    <section class="position-relative mt12">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-12 col-lg-12 ">
                    <div class="text-center rv-heading-help">
                        <!-- Heading -->
                        <h1 class="rv-heading">
                            How can we help you
                        </h1>
                        <!-- Text -->
                        <p class="rv-sub-text">
                            Vitae neque, tortor, orci in tincidunt dui tincidunt sed eget. Enim commodo, dignissim malesuada bibendum. Tellus proin duis gravida in cursus quam sit felis, odio.
                        </p>
                    </div>

                </div>
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="rv-help-you">
                        <div class="rv-help">
                            <img class="rv-help-img" src="{{asset('')}}frontend_assets/doctor/img/banner1.png" />
                            <span class="rv-help-txt">We do care about your health</span>
                        </div>
                        <div class="rv-help">
                            <img class="rv-help-img" src="{{asset('')}}frontend_assets/doctor/img/banner2.png" />
                            <span class="rv-help-txt">How to stay healthy for life</span>
                        </div>
                        <div class="rv-help">
                            <img class="rv-help-img" src="{{asset('')}}frontend_assets/doctor/img/banner3.png" />
                            <span class="rv-help-txt">Providing the best health solutions</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Medical Services of The Specialties -->
    <section class="position-relative mt12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 ">
                    <div class="text-center rv-heading-Services">
                        <!-- Heading -->
                        <h1 class="rv-heading">
                            Medical Services of The Specialties
                        </h1>
                        <!-- Text -->
                        <p class="rv-sub-text">
                            Vitae neque, tortor, orci in tincidunt dui tincidunt sed eget. Enim commodo, dignissim malesuada bibendum. Tellus proin duis gravida in cursus quam sit felis, odio.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="rv-service-list">
                        @if($home_category)
                        @foreach($home_category as $key=>$value)
                        <div class="rv-service">
                            <div class="rv-icon-s"><img src="{{$value->image}}"></div>
                            <div class="rv-text-s"><a href="{{url('/doctor_list')}}">{{$value->name}}</a></div>
                        </div>
                        @endforeach
                        @endif
                     
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Get to know our Doctors -->
    <section class="position-relative mt12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 ">
                    <div class="text-center rv-heading-know-dr">
                        <!-- Heading -->
                        <h1 class="rv-heading">
                            Get to know our Doctors
                        </h1>
                        <!-- Text -->
                        <p class="rv-sub-text">
                            PLEASE READ THROUGH THEIR PROFILES TO LEARN MORE.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <div id="know-doctors" class="owl-carousel">
                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-1.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Dr Odile de Mesmay, GP</h5>
                                    <p>DIRECTOR OF OUR TEAM OF LONDON BASED PRIVATE</p>
                                </div>
                            </div>
                        </div>

                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-2.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Mrs. Anna, Dental Nurse</h5>
                                    <p>MEMBER OF THE ROYAL COLLEGE OF GENERAL PRACTITIONERS 2017</p>
                                </div>
                            </div>
                        </div>

                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-3.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Dr Odile de Mesmay, GP</h5>
                                    <p>DIRECTOR OF OUR TEAM OF LONDON BASED PRIVATE</p>
                                </div>
                            </div>
                        </div>

                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-1.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Dr Odile de Mesmay, GP</h5>
                                    <p>DIRECTOR OF OUR TEAM OF LONDON BASED PRIVATE</p>
                                </div>
                            </div>
                        </div>

                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-2.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Mrs. Anna, Dental Nurse</h5>
                                    <p>MEMBER OF THE ROYAL COLLEGE OF GENERAL PRACTITIONERS 2017</p>
                                </div>
                            </div>
                        </div>

                        <div class="rv-carousel-iteam">
                            <div class="rv-shadow-effect">
                                <img class="rv-img-responsive" src="{{asset('')}}frontend_assets/doctor/img/car-3.png" alt="">
                                <div class="rv-item-details">
                                    <h5>Dr Odile de Mesmay, GP</h5>
                                    <p>DIRECTOR OF OUR TEAM OF LONDON BASED PRIVATE</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- footer -->
    <section class="position-relative mt12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 ">
                    <div class="rv-footer-booking">
                        <form>
                            <div class="rv-book-appointment">
                                <div class="rv-top-ba">
                                    <span class="title">Book an appointment</span>
                                    {{-- <button type="button" class="btn rv-btn">Book Now</button> --}}
                                    <a href="{{url('/doctor_list')}}" class="btn rv-btn">Book Now</a>
                                </div>
                                <div class="rv-ba-details">
                                    <div class="rv-ad">
                                        <div class="rv-icon">
                                            <img src="{{asset('')}}frontend_assets/doctor/img/profile.png" />
                                        </div>
                                        <div class="rv-details">
                                            <span class="rv-line1">Full Name</span>
                                            <span class="rv-line2">
                                            <input type="text"/>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="rv-ad">
                                        <div class="rv-icon">
                                            <img src="{{asset('')}}frontend_assets/doctor/img/date.png" />
                                        </div>
                                        <div class="rv-details">
                                            <span class="rv-line1">Appointment Date</span>
                                            <span class="rv-line2">
                                            <input type="date"/>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="rv-ad">
                                        <div class="rv-icon">
                                            <img src="{{asset('')}}frontend_assets/doctor/img/call.png" />
                                        </div>
                                        <div class="rv-details">
                                            <span class="rv-line1">Contact Number</span>
                                            <span class="rv-line2">
                                            <input type="tel"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                        </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
@endsection
@section('extern-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('')}}frontend_assets/doctor/js/owl.carousel.min.js"></script>
    <script src="{{asset('')}}frontend_assets/doctor/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 55,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        })
    </script>
@endsection