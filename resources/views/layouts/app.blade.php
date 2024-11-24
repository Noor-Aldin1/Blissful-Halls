<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include datepicker CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include Bootstrap CSS (if needed) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Heavenseek') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- ------------navbar-------------- --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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


</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="{{ route('home') }}" class="logo">
                <img src="assets1/img/logos/logo.png" class="logo-one" alt="Logo" width="127" />
                <img src="assets1/img/logos/footer-logo.png" class="logo-two" alt="Logo" />
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="assets1/img/logos/logo.png" class="logo-one" alt="Logo" style="width: 150px; " />


                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="{{ route('lessor.dashboard') }}"
                                    class="nav-link {{ request()->routeIs('lessor.dashboard') ? 'active' : '' }}">
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('lessor.bookings') }}"
                                    class="nav-link {{ request()->routeIs('lessor.bookings') ? 'active' : '' }}">
                                    Bookings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('lessor.create') }}"
                                    class="nav-link {{ request()->routeIs('lessor.create') ? 'active' : '' }}">
                                    Add Property
                                </a>
                            </li>



                        </ul>
                        <!-- Authentication Links -->

                        <ul class=" ">
                            <li class="nav-item" style="list-style: none; color:brown">
                                @auth
                                    <div class="dropdown">
                                        <a style="color: brown;" href="#" class="nav-link dropdown-toggle"
                                            id="userDropdown" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-user"></i>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item" href="{{ route('usprofile') }}">Profile</a></li>
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="default-btn btn-bg-one border-radius-5">Login</a>
                                    <a href="{{ route('register') }}" class="default-btn btn-bg-one border-radius-5">Sign
                                        Up</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <main class="container mx-auto px-4 py-6 flex-grow">
        @yield('content')
    </main>


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

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    @yield('scripts')

</body>

</html>
