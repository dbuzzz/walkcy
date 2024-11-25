<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Signup</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="{{asset('')}}admin_assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/app.css"
              rel="stylesheet">
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/app.rtl.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/vendor-material-icons.css"
              rel="stylesheet">
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/vendor-material-icons.rtl.css"
              rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/vendor-fontawesome-free.css"
              rel="stylesheet">
        <link type="text/css"
              href="{{asset('')}}admin_assets/css/vendor-fontawesome-free.rtl.css"
              rel="stylesheet">

        <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

        <script type="text/javascript">
            siteUrl = '{{url("")}}';
        </script>


       
    </head>

    <body class="layout-login-centered-boxed">

        <!-- <div class="layout-login__overlay"></div> -->
        <div class="layout-login-centered-boxed__form card"
             data-perfect-scrollbar>
            <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
                <a href="{{url('/')}}"
                   class="navbar-brand"
                   style="min-width: 0">
                    <img class="navbar-brand-icon"
                         src="{{asset('')}}admin_assets/images/ayush_aroggyam_logo_420x.png"
                         width="200"
                         alt="Multivendor">
                    {{-- <span>Multivendor</span> --}}
                </a>
            </div>

            <h4 class="m-0">Sign up!</h4>
            <p class="mb-5">Create an account with Ayusharogyam</p>

            <form id="signup_form">
                @csrf
                <div class="form-group">
                    <label class="text-label"
                           for="name_2">Name:</label>
                    <div class="input-group input-group-merge">
                        <input id="name_2"
                               type="text"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="John Doe" name="name">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <label for="exampleInputEmail1"> Role</label>
                        <select  class="form-control" name="role" id="role">
                        <option value="">Choose role</option>
                        <option value="3">Vendor</option>
                        <option value="5">Doctor</option>
                        {{-- @if(!empty($role))
                        @foreach($role as $key=>$value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                        @endif --}}
                     
                    </select>
                </div>


                <div class="form-group">
                    <label class="text-label"
                           for="name_2">Mobile:</label>
                    <div class="input-group input-group-merge">
                        <input id="name_2"
                               type="number"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="mobile" name="mobile">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2"
                               type="email"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="john@doe.com" name="email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label"
                           for="password_2">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_2"
                               type="password"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="Enter your password" name="password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-label"
                           for="password_21">Confirm Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password_21"
                               type="password"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="Enter your password" name="confirm_password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="show_pass" onclick="show_passs()" value="1" class="float-left">
                <span>Show Password</span>
               
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"
                            type="submit">Create Account</button><br>
                    <a class="text-body text-underline"
                       href="{{url('admin')}}">Have an account? Login</a>
                </div>

                <div id="link">
                </div>
            </form>
        </div>

        <!-- jQuery -->
        <script src="{{asset('')}}admin_assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="{{asset('')}}admin_assets/vendor/popper.min.js"></script>
        <script src="{{asset('')}}admin_assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{asset('')}}admin_assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="{{asset('')}}admin_assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="{{asset('')}}admin_assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="{{asset('')}}admin_assets/js/toggle-check-all.js"></script>
        <script src="{{asset('')}}admin_assets/js/check-selected-row.js"></script>
        <script src="{{asset('')}}admin_assets/js/dropdown.js"></script>
        <script src="{{asset('')}}admin_assets/js/sidebar-mini.js"></script>
        <script src="{{asset('')}}admin_assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{asset('')}}admin_assets/js/app-settings.js"></script>

        <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('')}}admin_assets/custom_js/admin_login.js"></script>

        <script type="text/javascript">
            function show_passs(){
               val = $("#show_pass").val();
               if (val==1) {
                  $("input:password").attr("type","text");
                  $("#show_pass").val(2);
               }else{
                  $("input[name=password]").attr("type","password");
                  $("input[name=confirm_password]").attr("type","password");
                  $("#show_pass").val(1);
               }
            }

        </script>

    </body>


<!-- Mirrored from demo.frontted.com/Multivendor/120/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 08:06:11 GMT -->
</html>