<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap CSS -->
    <base href="{{ url('/') }}/">
    <link rel="stylesheet" href="{{ url('assets1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/fonts/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/boxicons.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/nice-select.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/meanmenu.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('assets1/css/responsive.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ url('assets1/img/favicon.png') }}" />


    <title>@yield('title')</title>
</head>

<body>
    <!-- PreLoader Start -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-cube-area">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- PreLoader End -->



    <!-- Start Navbar Area -->
    <!-- headeer -->
    @include('layouts.header')
    <!-- End Navbar Area -->

    @yield('content')
    <!-- Services Area Three End -->

    <!-- Footer Area -->
    <!-- fooooter -->
    @include('layouts.Footer')
    <!-- Footer Area End -->

    <!-- Jquery Min JS -->
    <script src="assets1/js/jquery.min.js"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="assets1/js/bootstrap.bundle.min.js"></script>
    <!-- Magnific Popup Min JS -->
    <script src="assets1/js/jquery.magnific-popup.min.js"></script>
    <!-- Owl Carousel Min JS -->
    <script src="assets1/js/owl.carousel.min.js"></script>
    <!-- Nice Select Min JS -->
    <script src="assets1/js/jquery.nice-select.min.js"></script>
    <!-- Wow Min JS -->
    <script src="assets1/js/wow.min.js"></script>
    <!-- Jquery Ui JS -->
    <script src="assets1/js/jquery-ui.js"></script>
    <!-- Meanmenu JS -->
    <script src="assets1/js/meanmenu.js"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="assets1/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator Min JS -->
    <script src="assets1/js/form-validator.min.js"></script>
    <!-- Contact Form JS -->
    <script src="assets1/js/contact-form-script.js"></script>
    <!-- Custom JS -->
    <script src="assets1/js/custom.js"></script>

    @stack('js')
</body>

</html>
