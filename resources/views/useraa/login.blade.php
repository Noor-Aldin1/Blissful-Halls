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
                        <form id="contactForm" novalidate="true" method="POST" action="{{ route('login') }}"  >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 form-condition">
                                    <div class="agree-label">
                                        <input type="checkbox" id="chb1">
                                        <label for="chb1">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <a class="forget" href="#">Forgot My Password?</a>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn btn-bg-three border-radius-5 disabled" style="pointer-events: all; cursor: pointer;">
                                        {{ __('Log in') }}
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="account-desc">
                                        Not a Member?
                                        <a href="sign-up.html">Sign Up</a>
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
