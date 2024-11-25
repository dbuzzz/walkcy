@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')


	<div class="breadcrumb-area bg-img" data-bg="{{asset('')}}frontend_assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Store Location</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Store Location</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2 class="contact-title">Store Locator</h2>
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="411" height="366" id="gmap_canvas" src="https://maps.google.com/maps?q=Hanumangadi Mandir, Walkcy, Ram path Road, beside sagar Life Style, Rikaabganj, Faizabad, Uttar Pradesh 224001&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:366px;width:411px;}</style><a href="https://embedgooglemap.2yu.co">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:366px;width:411px;}</style></div></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info pt-0">
                            <h2 class="contact-title">Address</h2>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                                est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                                formas human.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> {!!@$datacontact->location!!}</li>
                                <li><i class="fa fa-phone"></i> {!!@$datacontact->mail!!}</li>
                                <li><i class="fa fa-envelope-o"></i> {!!@$datacontact->contact!!}</li>
                            </ul>
                           {{--  <div class="working-time">
                                <h3>Working Hours</h3>
                                <p class="pb-0"><span>Monday – Saturday:</span>08AM – 22PM</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


	<!-- End Subscribe Form -->


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection