@extends('layouts.BasicView')
@section('title', 'Havenseek')
@section('content')
    <!-- Banner Area -->
    <div class="banner-area" style="height: 480px">
        <div class="container">
            <div class="banner-content">
                <h1>Explore Our Venues to Find the Perfect Place for Your Event</h1>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <div class="banner-form-area">
        <div class="container">
            <div class="banner-form">
                <form action="{{ route('property') }}" method="GET">
                    <div class="row justify-content-center align-items-center" style="position: relative; z-index: 1000">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2" style="position: relative; z-index: 1000">
                            <div class="form-group" style="position: relative; z-index: 1000">
                                <label>City</label>
                                <select class="form-control" name="city">
                                    <option value="">All Cities</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <button type="submit" class="default-btn btn-bg-one border-radius-5">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Banner Form Area End -->

    <!-- Room Area -->
    <div class="blog-area pt-100">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">Properties</span>
                <h2>Our Latest Properties</h2>
            </div>
            <div class="row pt-45">
                @forelse ($properties as $pro)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <a href="{{ route('showproperty', $pro->id) }}">
                                <img style="width: 520px; height: 300px;"
                                    src="{{ asset('storage/' . $pro->property_images[0]->image) }}" alt="Images" />
                            </a>
                            <div class="content">
                                <h3>
                                    <a href="{{ route('showproperty', $pro->id) }}" class="sp-color">{{ $pro->name }}</a>
                                </h3>
                                <ul class="d-flex justify-content-between mb-2">
                                    <li>
                                        <span style="font-weight: bolder">City:
                                        </span>
                                        {{ $pro->location }}
                                    </li>
                                    <li>
                                        <span style="font-weight: bolder">Capacity:
                                        </span>
                                        {{ $pro->capacity }}
                                    </li>
                                </ul>
                                <ul class="d-flex justify-content-between mb-2">
                                    <li>
                                        <span style="font-weight: bolder">Price:
                                        </span>
                                        {{ number_format($pro->price_per_full_day, 2) }}$ / Per Day
                                    </li>

                                    <li>
                                        <span style="font-weight: bolder">Category:
                                        </span>
                                        {{ $pro->category->name }}
                                    </li>
                                </ul>
                                <ul class="d-flex justify-content-center mb-2">
                                    <span style="font-weight: bolder">Location:
                                    </span>
                                    {{ $pro->address }}
                                </ul>
                                <a href="{{ route('showproperty', $pro->id) }}" class="read-btn mt-3 w-100">
                                    Book
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>There are no proparties</p>
                @endforelse






            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('property') }}" class="default-btn btn-bg-three">See more</a>
            </div>
        </div>
    </div>
    <!-- Room Area End -->

    <!-- Book Area Two-->
    <div class="book-area-two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="book-content-two">
                        <div class="section-title">
                            <span class="sp-color">MAKE A QUICK BOOKING</span>
                            <h2>
                                We Are the Best in All-time & So Please Get
                                a Quick Booking
                            </h2>
                            <p>
                                Secure Your Ideal Venue with Ease Havenseek connects you to top-rated venues globally,
                                ensuring your event is a memorable one. Our dedicated support team is here to assist you
                                every step of the way, making us a trusted choice for exceptional event experiences.
                            </p>
                        </div>
                        <a href="#" class="default-btn btn-bg-three">Quick Booking</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="book-img-2">
                        <img src="https://familydoctor.com.au/hillcrestfamilymedicine/wp-content/uploads/sites/155/2024/02/family-doctor-3-1.jpg"
                            alt="Images" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Book Area Two End -->

    <!-- Services Area Three -->
    <div class="services-area-three pt-100 pb-70 section-bg">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">Our Services</span>
                <h2>
                    Global Reservation Services for Our Clients
                </h2>
            </div>

            <div class="row pt-45">
                <div class="col-lg-6 col-md-6">
                    <div class="service-item-two">
                        <i class="flaticon-hotel"></i>
                        <div class="content">
                            <h3>
                                <a href="{{ route('property') }}">Hotel Room Reservations</a>
                            </h3>
                            <p>
                                Easily reserve a hotel room in your desired location for a memorable stay.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="service-item-two">
                        <i class="flaticon-resort"></i>
                        <div class="content">
                            <h3>
                                <a href="{{ route('property') }}">Resort Reservations</a>
                            </h3>
                            <p>
                                Find and book the perfect resort for your getaway in prime locations.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="service-item-two">
                        <i class="flaticon-buildings"></i>
                        <div class="content">
                            <h3>
                                <a href="{{ route('property') }}">Wedding Hall Reservations</a>
                            </h3>
                            <p>
                                Reserve elegant wedding halls in the best locations to make your special day unforgettable.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="service-item-two">
                        <i class="flaticon-businessmen"></i>
                        <div class="content">
                            <h3>
                                <a href="{{ route('property') }}">Conference Room Reservations</a>
                            </h3>
                            <p>
                                Secure a professional conference room that meets all your business needs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
