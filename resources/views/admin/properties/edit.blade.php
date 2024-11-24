@extends('layouts.master')

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1>Edit Property</h1>
                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}" required>
                    </div>
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Lessor -->
                    <div class="form-group">
                        <label for="lessor_id">Lessor</label>
                        <select id="lessor_id" name="lessor_id" class="form-control" required>
                            @foreach($lessors as $lessor)
                                <option value="{{ $lessor->id }}" {{ $property->lessor_id == $lessor->id ? 'selected' : '' }}>
                                    {{ $lessor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $property->description }}</textarea>
                    </div>
                    <!-- Location -->
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $property->location }}" required>
                    </div>
                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $property->address }}" required>
                    </div>
                     <!-- Price per Day -->
                     <div class="form-group">
                        <label for="price_per_full_day">Price per Day</label>
                        <input type="number" class="form-control" id="price_per_full_day" name="price_per_full_day" value="{{ $property->price_per_full_day }}" step="0.01" required>
                    </div>
                    <!-- Capacity -->
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" step="0.01" value="{{ $property->capacity }}" required>
                    </div>
                    <!-- Availability -->
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select id="availability" name="availability" class="form-control" required>
                            <option value="1" {{ $property->availability == 1 ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ $property->availability == 0 ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="auth">Authentication Property</label>
                        <select id="auth" name="auth" class="form-control" >
                            <option value="pending" {{ $property->auth == "pending" ? 'selected' : '' }}>Pending</option>
                            <option value="rejected" {{ $property->auth == "rejected" ? 'selected' : '' }}>Rejected</option>
                            <option value="certified" {{ $property->auth == "certified" ? 'selected' : '' }}>Certified</option>
                        </select>
                    </div>
                    <!-- Image (optional) -->
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($property->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $property->image) }}" width="200" alt="Current Image">
                            </div>
                        @endif
                    </div>
                    <div id="image-fields">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-danger">Update Property</button>
                </form>
            </div>
        </div>
    </div>
</body>
<style>
    .btn-danger{
  border-color:#f0d892 ; background-color:#f0d892 ;
 }
 .btn-danger:hover{
  background-color: black;
  border-color: black;
 }
</style>



@endsection
