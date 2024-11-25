
@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<main>
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">CONTACT US</h2>
      </div>
    </section>
    
    {{-- <section class="google-map mb-5">
      <h2 class="d-none">Contact US</h2>
      <div id="map" class="google-map__wrapper"></div>
    </section> --}}

    <section class="contact-us container">
      <div class="mw-930">
        <div class="row mb-5">
          <div class="col-lg-12">
            <h3 class="mb-4">Store in India</h3>
            <p class="mb-4">Hanumangadi Mandir, Walkcy, Ram path Road, beside sagar Life Style<br>Rikabganj, Faizabad, Uttar Pradesh 224001</p>
            <p class="mb-4">help@walkcy.com<br> 093353 36433</p>
          </div>
        
        </div>
        <div class="contact-us__form">
          <form name="contact-us-form" id="save_form" class="needs-validation" novalidate>
            <h3 class="mb-5">Get In Touch</h3>
            <div class="form-floating my-4">
              <input name="name" type="text" class="form-control" id="contact_us_name" placeholder="Name *" required>
              <label for="contact_us_name">Name *</label>
            </div>
            <div class="form-floating my-4">
              <input name="phone" type="number" class="form-control" id="contact_us_name1" placeholder="Phone *" required>
              <label for="contact_us_name1">Phone *</label>
            </div>
            <div class="form-floating my-4">
              <input type="email" class="form-control" id="contact_us_email" placeholder="Email address *" required name="email">
              <label for="contact_us_name">Email address *</label>
            </div>
            <div class="form-floating my-4">
              <input type="text" name="subject" class="form-control" id="contact_us_email" placeholder="Subject *" required name="email">
              <label for="contact_us_name">Subject *</label>
            </div>
            <div class="my-4">
              <textarea class="form-control form-control_gray" placeholder="Your Message" cols="30" rows="8" required name="message"></textarea>
            </div>
            <div class="my-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection