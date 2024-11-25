{{-- <!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>


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
                <a href="index.html"
                   class="navbar-brand"
                   style="min-width: 0">
                    <img class="navbar-brand-icon"
                         src="{{asset('uploads/default/walkcy.png')}}"
                         width="200"
                         alt="Stack" style=" background: black; ">
                </a>
            </div>

            <h4 class="m-0">Welcome back!</h4>
            <p class="mb-5">Login to access your Account </p>

            <form id="admin_login">
                @csrf
                <div class="form-group">
                    <label class="text-label"
                           for="email_2">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email_2"
                               type="email"
                               required=""
                               class="form-control form-control-prepended"
                               placeholder="john@doe.com"
                               name="email">
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
                               placeholder="Enter your password"
                               name="password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="show_pass" onclick="show_passs()" value="1" class="float-left">
                <span>Show Password</span>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-5"
                            type="submit">Login</button>
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
</html> --}}



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://softpro-admin-templates.websitedesignmarketingagency.com/images/favicon.ico">

    <title>Walkcy</title>
  
    <!-- Bootstrap 4.1-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/bootstrap-extend.css">  
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/master_style.css">

    <!-- SoftPro admin skins -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/skins/_all-skins.css">  

    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">


        <script type="text/javascript">
            siteUrl = '{{url("")}}';
        </script>

</head>
<body class="hold-transition bg-gray-light">
    
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            
            <div class="col-lg-5 col-md-8 col-12">
                <div class="content-top-agile bg-dark">
                    {{-- <h2>Insurent</h2> --}}
                    <img style=" width: 193px; " src="{{asset('uploads/default/walkcy.png')}}">
                      {{-- <p class="gap-items-2 mb-20">
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
                          <a class="btn btn-social-icon btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
                        </p> --}}
                </div>
                <div class="p-40 mt-10 bg-white content-bottom box-shadowed">
                    <form id="admin_login">
                        @csrf
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-dark"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-dark"><i class="ti-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                          <div class="row">
                            
                            <!-- /.col -->
                            <div class="col-12 text-center">
                              <button type="submit" class="btn btn-dark-outline btn-block mt-10 btn-rounded">SIGN IN</button>
                            </div>
                            <!-- /.col -->
                          </div>
                    </form> 
                    {{-- <div class="text-center mt-20">
                        <p class="mb-0">Don't have an account? <a href="auth-register.html" class="text-info ml-5">Sign Up</a></p>
                    </div> --}}
                </div>
            </div>
            
            
        </div>
    </div>


    <!-- jQuery 3 -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- popper -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/popper/dist/popper.min.js"></script>
    
    <!-- Bootstrap 4.1-->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('')}}admin_assets/custom_js/admin_login.js"></script>

</body>

</html>
