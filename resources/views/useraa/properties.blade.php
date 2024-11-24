@extends('layouts.BasicView');
@section('title', 'Properties')
@section('content')
    <style>
        <style>.form-group {
            margin-bottom: 1rem;
            /* Space below each form group */
        }

        .form-select {
            width: 100%;
            /* Ensure the select box takes full width */
            padding: 0.5rem;
            /* Padding inside the select box */
            border: 1px solid #ced4da;
            /* Border color */
            border-radius: 0.25rem;
            /* Rounded corners */
            background-color: #ffffff;
            /* White background color */
            background-image: none;
            /* Remove any background images */
            appearance: none;
            /* Remove default styling */
            -webkit-appearance: none;
            /* Remove default styling in Safari */
            -moz-appearance: none;
            /* Remove default styling in Firefox */
        }

        .form-select:focus {
            border-color: #80bdff;
            /* Focus border color */
            outline: none;
            /* Remove default outline */
        }

        .form-group label {
            display: block;
            /* Block display for labels */
            margin-bottom: 0.5rem;
            /* Space below the label */
            font-weight: bold;
            /* Bold label text */
        }

        .custom-property-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            /* Ensure consistent card width /
                            max-height: 450px;
                            / Fixed height to ensure uniformity /
                        }

                        .custom-property-img {
                            width: 100%;
                            height: 200px;
                            / Fixed height for the image /
                            object-fit: cover;
                            / Scale image properly within the set dimensions */
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .custom-property-card .custom-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .custom-property-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            text-align: center;
        }

        .custom-property-details {
            padding-left: 0;
            list-style: none;
            margin-bottom: auto;
            text-align: center;
        }

        .custom-property-details li {
            margin-bottom: 0.5rem;
        }

        .custom-read-btn {
            background-color: #b56952;
            color: white;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .custom-read-btn:hover {
            background-color: #a45543;
        }
    </style>

    </style>

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg3">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>properties</li>
                </ul>
                <h3>properties</h3>
            </div>
        </div>

    </div>
    <br>
    <div class="container">
        <div class="side-bar-form p-4 bg-light shadow-sm rounded">
            <h3 class="text-center mb-4">Property Filter</h3>
            <form action="{{ route('property') }}" method="GET" id="filter-form">
                <div class="row g-3">

                    <!-- Category Input -->
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" class="form-select" name="category">
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

                    <!-- City Input -->
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" class="form-select" name="city">
                                <option value="">All Cities</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Price Range Inputs -->
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <label for="min_price">Price Range</label>
                            <div class="input-group">
                                <span class="input-group-text">Min</span>
                                <input type="number" id="min_price" class="form-control" placeholder="0" name="min_price"
                                    value="{{ request('min_price') }}">
                                <span class="input-group-text">Max</span>
                                <input type="number" class="form-control" placeholder="3000" name="max_price"
                                    value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Capacity Range Inputs -->
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <label for="min_capacity">Capacity Range</label>
                            <div class="input-group">
                                <span class="input-group-text">Min</span>
                                <input type="number" id="min_capacity" class="form-control" placeholder="1"
                                    name="min_capacity" value="{{ request('min_capacity') }}">
                                <span class="input-group-text">Max</span>
                                <input type="number" class="form-control" placeholder="50" name="max_capacity"
                                    value="{{ request('max_capacity') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Search Field -->
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label for="search">Search</label>
                            <div class="input-group">

                                <input type="text" id="search" class="form-control border-start-0"
                                    placeholder="type  to search" name="search" value="{{ request('search') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 text-center">
                        <button type="submit" class="btn text-white me-2" style="background: #b56952">
                            Filter
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="clearFilters()">
                            Clear Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function clearFilters() {
                const form = document.getElementById('filter-form');
                form.reset();
                form.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                window.location.href = "{{ route('property') }}";
            }
        </script>



        <div class="section-title text-center">

            <h2>Properties</h2>
        </div>
        <div class="row pt-65">
            @forelse ($properties as $pro)
                <div style="    margin-bottom: 6.5rem !important;
" class="col-lg-4 col-md-6 mb-4">
                    <div class="custom-property-card shadow-sm rounded">
                        <a href="{{ route('showproperty', $pro->id) }}">
                            <img class="custom-property-img"
                                src="{{ asset('storage/' . $pro->property_images[0]->image) }}" alt="Property Image">
                        </a>
                        <div class="custom-content p-3">
                            <h3 class="custom-property-title">
                                <a href="{{ route('showproperty', $pro->id) }}" class="sp-color">{{ $pro->name }}</a>
                            </h3>
                            <ul class="custom-property-details">
                                <li><span class="fw-bold">City:</span> {{ $pro->location }}</li>
                                <li><span class="fw-bold">Capacity:</span> {{ $pro->capacity }}</li>
                                <li><span class="fw-bold">Price:</span> {{ number_format($pro->price_per_full_day, 2) }}$ /
                                    Per Day</li>
                                <li><span class="fw-bold">Category:</span> {{ $pro->category->name }}</li>
                                <li><span class="fw-bold">Location:</span> {{ $pro->address }}</li>
                            </ul>
                            <a href="{{ route('showproperty', $pro->id) }}" class="custom-read-btn btn mt-3 w-100">Book</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No properties found.</p>
            @endforelse
        </div>

        <br>
        <br>


        {{ $properties->links('vendor.pagination.custom') }}


        {{-- <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
                <a href="#" class="prev page-numbers">
                    <i class="bx bx-chevrons-left"></i>
                </a>

                <span class="page-numbers current" aria-current="page">1</span>
                <a href="#" class="page-numbers">2</a>
                <a href="#" class="page-numbers">3</a>

                <a href="#" class="next page-numbers">
                    <i class="bx bx-chevrons-right"></i>
                </a>
            </div>
        </div> --}}
    </div>
    </div>
@endsection
