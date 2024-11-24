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
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}"
                                class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('property') }}"
                                class="nav-link {{ request()->routeIs('property') ? 'active' : '' }}">
                                Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Faq') }}"
                                class="nav-link {{ request()->routeIs('Faq') ? 'active' : '' }}">
                                FAQ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}"
                                class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('host') }}"
                                class="nav-link   request()->routeIs('host') ? 'active' : '' }} ">
                                <b> Host Portal</b>
                            </a>
                        </li>

                    </ul>
                    <!-- Authentication Links -->

                    <ul class=" ">
                        <li class="nav-item" style="list-style: none; color:brown">
                            @auth
                                <div class="dropdown">
                                    <a style="color: brown;" href="#" class="nav-link dropdown-toggle"
                                        id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a style="background:  #d08a6c" href="{{ route('login') }}"
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
