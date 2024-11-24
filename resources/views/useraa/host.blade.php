@extends('layouts.BasicView')
@section('title', 'Havenseek')
@section('content')
    <style>
        .register-content-two {
            padding: 20px;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .sp-color {
            font-size: 14px;
            color: #ff6f61;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .registration-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button.default-btn.btn-bg-three {
            padding: 10px 20px;
            background-color: #ff6f61;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .book-img-2 {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-img-2 img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
    <!-- Book Area Two-->
    <div class="book-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2> Welcome to the <span style="color:#b56952 " class="noor">Host Registration Page</span>

                </h2>
                <br>
                <br>
                <br>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="register-content-two" style="padding: 20px;">
                        <div class="section-title" style="margin-bottom: 20px;">
                            <span class="sp-color" style="font-size: 14px; color: #ff6f61;">REGISTER AS A HOST</span>
                            <h2 style="font-size: 28px; font-weight: bold; color: #333;">
                                Join Us and Start Managing Your Venue
                            </h2>
                        </div>
                        <form id="registrationForm" method="POST" action="{{ route('lessor.register') }}"
                            class="registration-form" style="display: flex; flex-direction: column; gap: 15px;">
                            @csrf

                            <!-- Name -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="name" style="margin-bottom: 5px; font-weight: bold;">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="email" style="margin-bottom: 5px; font-weight: bold;">Email Address:</label>
                                <input type="email" id="email" name="email" class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="password" style="margin-bottom: 5px; font-weight: bold;">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="password_confirmation" style="margin-bottom: 5px; font-weight: bold;">Confirm
                                    Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="phone_num" style="margin-bottom: 5px; font-weight: bold;">Phone Number:</label>
                                <input type="text" id="phone_num" name="phone_num" class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('phone_num')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="form-group" style="display: flex; flex-direction: column;">
                                <label for="address" style="margin-bottom: 5px; font-weight: bold;">Address:</label>
                                <input type="text" id="address" name="address" class="form-control" required
                                    style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 10px 20px; background-color: #ff6f61; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Register</button>
                            </div>

                            <h3 style="margin-top: 15px;">
                                Already have an account?
                                <a href="{{ route('login') }}"
                                    style="color: #b56952; text-decoration: none; font-weight: bold;">Login</a>
                            </h3>
                        </form>

                        <!-- SweetAlert Script -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent the form from submitting immediately

                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "Please confirm your registration details!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, register me!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Submit the form if the user confirms
                                        event.target.submit();
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="book-img-2">
                        <img src="https://ik.imagekit.io/livlabs/ik-seo/pma/assets/iStock-1468528810_So5VO2-gm4/real-estate-agents-offer-contracts-and-interest-rates-to-buy-or-rent-a-residence-and-businessman-in-front-of-house-model-small-building-concept-property-and-real-estate-insurance-vertical-image.jpg?tr=w-auto,dpr-auto"
                            alt="Images" style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Book Area Two End -->


@endsection
