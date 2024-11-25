<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Verification</title>

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

    <body class="layout-login">

        <div class="layout-login__overlay"></div>
        <div class="layout-login__form bg-white"
             data-perfect-scrollbar>
            <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
                <a href="index.html"
                   class="navbar-brand"
                   style="min-width: 0">
                    <img class="navbar-brand-icon"
                         src="{{asset('')}}admin_assets/images/ayush_aroggyam_logo_420x.png"
                         width="200"
                         alt="Multivendor">
                    {{-- <span>Multivendor</span> --}}
                </a>
            </div>

            <h4 class="m-0">Hey {{$user->name}}!</h4>
            <p class="mb-5">Verify Your Account To Continue</p>

            <form id="verification_form">
                <input type="hidden" name="token" value="{{$user->token}}">
                @csrf
                @if(!empty($attribute))
                @foreach($attribute as $key=>$value)
                <div class="form-group">
                    <label class="text-label"
                           for="name_2">{{$value->title}}:</label>
                    <div class="input-group">
                        <input 
                               type="{{$value->type}}"
                               class="{{$value->type == 'checkbox'?'':'form-control'}}"
                               {{$value->is_required == 1?'required':''}}

                               placeholder="Enter {{$value->title}}" name="{{$value->name}}">
                    </div>
                </div>
                @endforeach
                @endif
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2"
                            type="submit">Verify</button>
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

    </body>


<!-- Mirrored from demo.frontted.com/Multivendor/120/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 08:06:11 GMT -->
</html>