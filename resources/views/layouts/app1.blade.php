<!DOCTYPE html>
<html lang="en">

<head>
    <title>Look-i</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/bootstrap/bootstrap-grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/bootstrap/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/open-ionic-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/client/css/flaticon.css') }}">
</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('include.header')

    {{-- start content --}}
    @yield('content')
    {{-- end content --}}


    @include('include.footer')





    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/js/aos.js') }}"></script>
    <script src="{{ asset('client/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('client/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('client/js/google-map.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
