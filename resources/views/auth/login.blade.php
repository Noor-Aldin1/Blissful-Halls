@extends('layouts.BasicView')

@section('content')
<div class="sign-in-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <span class="sp-color">Sign In</span>
                            <h2>Sign In to Your Account!</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your Username or Email" placeholder="Email" value="{{ old('email') }}" autofocus>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" required placeholder="Password" autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 form-condition">
                                    <div class="agree-label">
                                        <input type="checkbox" id="remember_me" name="remember">
                                        <label for="remember_me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    @if (Route::has('password.request'))
                                        <a class="forget" href="{{ route('password.request') }}">Forgot My Password?</a>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                        Sign In Now
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="account-desc">
                                        Not a Member?
                                        <a href="{{ route('register') }}">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


