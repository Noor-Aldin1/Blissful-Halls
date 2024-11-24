@extends('layouts.BasicView')
@section('title','Profile Info')

@section('content')
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="service-side-bar">
                    <div class="services-bar-widget">
                        <h3 class="title">Personal Information</h3>
                        <div class="side-bar-categories">
                            <!-- Ensure user is authenticated and photo path is correctly set -->
                            <img src="{{ asset('storage/' . auth()->user()->Photo) }}" class="rounded mx-auto d-block" alt="Image" style="width: 100px; height: 100px">
                            <br><br>

                            <ul>
                                <li>
                                    <a href="{{ route('usprofile') }}">User Profile </a>
                                </li>
                                <li>
                                    <a href="{{ route('mybooking', ['id' => auth()->user()->id]) }}">Booking Details </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout')}}" method="POST">
                                        @csrf
                                        <button style="width: 100%;     padding: 0; text-align: left; " type="submit"><a  > logout</a> </button> 
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="service-article">
                    <section class="checkout-area pb-70">
                        <div class="container">
                            <form action="{{ route('updateusprofile',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">User Profile</h3>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="text" class="form-control" value="{{ auth()->user()->email }}" name="email">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>User Profile <span class="required">*</span></label>
                                                        <input type="file" class="form-control" name="Photo" accept="image/*">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-danger">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
