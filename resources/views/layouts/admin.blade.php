<!DOCTYPE html>
<html>


<!-- Mirrored from themenate.com/applicator/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:17:23 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{asset('applicator/dist/assets/images/logo/apple-touch-icon.html')}}">
    <link rel="shortcut icon" href="{{asset('applicator/dist/assets/images/logo/favicon.png')}}">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="{{asset('applicator/dist/assets/vendor/bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('applicator/dist/assets/vendor/PACE/themes/blue/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('applicator/dist/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" />

    <!-- page css -->

    <!-- core css -->
    <link href="{{asset('applicator/dist/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('applicator/dist/assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('applicator/dist/assets/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('applicator/dist/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('applicator/dist/assets/css/app.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="app header-default side-nav-dark">
        <div class="layout">
            <!-- Header START -->
            @include('partials.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('partials.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Quick View START -->
                @include('partials.quickview')
                <!-- Side Panel END -->

                <!-- Content Wrapper START -->
                @yield('content')
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                @include('partials.footer')
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

        </div>
    </div>

    <script src="{{asset('applicator/dist/assets/js/vendor.js')}}"></script>

    <script src="{{asset('applicator/dist/assets/js/app.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('applicator/dist/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('applicator/dist/assets/vendor/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('applicator/dist/assets/js/dashboard/default.js')}}"></script>
    @yield('js')
</body>


<!-- Mirrored from themenate.com/applicator/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 11:18:15 GMT -->
</html>