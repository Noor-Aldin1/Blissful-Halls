@extends("layouts.BasicView")

@section('title','Register')

@section('content')
<div class="sign-up-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <span class="sp-color">Sign Up</span>
                            <h2>Create an Account!</h2>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" required placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                        Sign Up
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="account-desc">
                                        Already have an account?
                                        <a href="{{ route('login') }}">Sign In</a>
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
