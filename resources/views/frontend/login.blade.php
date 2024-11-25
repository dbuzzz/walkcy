@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
@endsection
@section('content')
<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
<main>
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <h2 class="d-none">Login & Register</h2>
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="register-tab" data-bs-toggle="tab" href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="false">Register</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
          <div class="login-form">
            <form name="login-form" id="_login" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control form-control_gray" id="customerNameEmailInput1" placeholder="Email address *" required>
                <label for="customerNameEmailInput1">Email address *</label>
              </div>
    
              <div class="pb-3"></div>
    
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control form-control_gray" id="customerPasswodInput" placeholder="Password *" required>
                <label for="customerPasswodInput">Password *</label>
              </div>
    
              <div class="d-flex align-items-center mb-3 pb-2">
                
                <a href="{{url('forget-password')}}" class="btn-text ms-auto">Lost password?</a>
              </div>
    
              <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>
    
              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="#register-tab" class="btn-text js-show-register">Create Account</a>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
          <div class="register-form">
            <form name="register-form" id="signup_form" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control form-control_gray" id="customerNameRegisterInput" placeholder="Username" required>
                <label for="customerNameRegisterInput">Username</label>
              </div>
    
              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control form-control_gray" id="customerEmailRegisterInput" placeholder="Email address *" required>
                <label for="customerEmailRegisterInput">Email address *</label>
              </div>
    
              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="mobile" type="number" class="form-control form-control_gray" id="customerEmailRegisterInput1" placeholder="Mobile Number *" required>
                <label for="customerEmailRegisterInput1">Mobile *</label>
              </div>
    
              <div class="pb-3"></div>
    
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput" placeholder="Password *" required>
                <label for="customerPasswodRegisterInput">Password *</label>
              </div>
              
              <div class="pb-3"></div>
    
              <div class="form-floating mb-3">
                <input name="confirm_password" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput1" placeholder="Password *" required>
                <label for="customerPasswodRegisterInput1">Confirm Password *</label>
              </div>
    
              <div class="d-flex align-items-center mb-3 pb-2">
                <p class="m-0">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
              </div>
    
              <button class="btn btn-primary w-100 text-uppercase" type="submit">Register</button>
            </form>
          </div>
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
<script src="{{url('frontend_assets/custom_js/user_login.js')}}"></script>
@endsection