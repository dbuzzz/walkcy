<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">


    <title>{{@$title}}</title>
  
    <!-- Bootstrap 4.1-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/bootstrap-extend.css">  
    <link rel="shortcut icon" href="{{asset('')}}frontend_assets/images/logo.png" type="image/x-icon">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/master_style.css">

    <!-- SoftPro admin skins -->
    <link rel="stylesheet" href="{{asset('')}}admin_assets/css/skins/_all-skins.css"> 
 
     <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
   
    @yield("extern-css")
    <script>
        const siteUrl = '{{url("")}}';
    </script> 
    <style type="text/css">
        li{
            list-style: none;
        }
    </style>

</head>

<body class="hold-transition skin-purple-light sidebar-mini sidebar-collapse">
    <div class="overlay"></div>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header bg-dark">
    <!-- Logo -->
    <a href="{{url('/category')}}" class="logo">
      <!-- mini logo -->
      <b class="logo-mini">
          <span class="light-logo"><img src="{{asset('uploads/default/walkcy.png')}}"></span>
     </b>
      <!-- logo-->
      <span class="logo-lg">
        {{-- <img src="{{asset('uploads/default/logo.png')}}"> --}}
        Walkcy
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        
      <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>

          </a>  
        
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        
          <!-- User Account-->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- <img src="../../images/user5-128x128.jpg" class="user-image rounded-circle b-2" alt="User Image"> --}}
                <span class="font-size-14">{{Auth::user()->name}}<i class="fa fa-user" aria-hidden="true"></i></span>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- Menu Body -->
              <li class="user-body bt-0">
                <div class="row no-gutters">
                  
               
                <div role="separator" class="divider col-12"></div>
                  
                <div role="separator" class="divider col-12"></div>
                  <div class="col-12 text-left">
                    <a href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                  </div>                
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header nav-small-cap">Menu</li>
        
        <li>
          <a href="{{url('homepage')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>HomePage</span>
          </a>
        </li>
        <li>
          <a href="{{url('banner')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Banner</span>
          </a>
        </li>
        <li>
          <a href="{{url('brand_partner')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Brand Partner</span>
          </a>
        </li>
        <li>
          <a href="{{url('category')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Category</span>
          </a>
        </li>
        <li>
          <a href="{{url('sub-category')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Sub-Category</span>
          </a>
        </li>
        <li>
          <a href="{{url('taxation')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Taxation</span>
          </a>
        </li>
        <li>
          <a href="{{url('product-management')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Add Product</span>
          </a>
        </li>
        <li>
          <a href="{{url('product-management/view')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>View Product</span>
          </a>
        </li>
       
        <li>
          <a href="{{url('order')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Order</span>
          </a>
        </li>
        <li>
          <a href="{{url('contact')}}">
            <i class="fa-sharp fa-solid fa-book"></i> <span>Contacts</span>
          </a>
        </li>


        

        <!-- <li>
          <a href="{{url('/vendor-management')}}">
            <i class="fa-sharp fa-solid fa-user"></i><span>Agent-Management</span>
          </a>
        </li> -->
    </ul>
    </section>
  </aside>
  @yield('content')


<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
        </ul>
    </div>
      &copy; {{date('Y')}} Walkcy All Rights Reserved.
  </footer>
</div>


<script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- popper -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/popper/dist/popper.min.js"></script>
    
    <!-- Bootstrap 4.1-->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- SlimScroll -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    
    <!-- FastClick -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/fastclick/lib/fastclick.js"></script>
    
    <!-- fullscreen -->
    <script src="{{asset('')}}admin_assets/assets/vendor_components/screenfull/screenfull.js"></script>
    
    <!-- SoftPro admin App -->
    <script src="{{asset('')}}admin_assets/js/template.js"></script>
    
    <script src="{{asset('')}}admin_assets/js/pages/fullscreen.js"></script>

    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{url('plugins/select2/js/select2.min.js')}}"></script>
    @yield('extern-js')

    </body>

</html>