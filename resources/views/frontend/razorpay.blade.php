<!DOCTYPE html>
<html>
<head>
    <title>Ayusharogyam</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif

            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif

            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">
              <h1>Proceed to Pyment</h1>
                    <h2>Pay With Razorpay</h2>

                    <form action="{{ url('r_payment') }}" method="POST" >
                    @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-image="http://testing.ayusharogyam.com/admin_assets/images/ayush_aroggyam_logo_420x.png"
                                data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="{{base64_decode($_GET['a'])*100}}"
                                data-buttontext="Pay {{base64_decode($_GET['a'])}} INR"
                                data-name="Ayusharogyam"
                                data-order_id = "{{base64_decode($_GET['o'])}}"
                                {{-- data-order_id="{{base64_decode($_GET['o'])}}" --}}
                                data-description="Payment"
                                {{-- data-prefill.name="Ayusharogyam" --}}
                                data-prefill.email="{{base64_decode($_GET['e'])}}"
                                data-prefill.contact="{{base64_decode($_GET['m'])}}"
                                data-theme.color="#679509">
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
