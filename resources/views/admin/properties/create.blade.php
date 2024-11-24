@extends('layouts.master')

@section('content')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h1>Add Property</h1>
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lessor_id">Lessor</label>
                        <select id="lessor_id" name="lessor_id" class="form-control" required>
                            @foreach($lessors as $lessor)
                                <option value="{{ $lessor->id }}">{{ $lessor->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="price_per_full_day">Price per full day</label>
                        <input type="number" class="form-control" id="price_per_full_day" name="price_per_full_day" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select id="availability" name="availability" class="form-control" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="auth">Authentication Property</label>
                        <select id="auth" name="auth" class="form-control" >
                            <option value="pending">Pending</option>
                            <option value="rejected">Rejected</option>
                            <option value="certified">Certified</option>
                        </select>
                    </div>

                    <!-- Image upload fields -->
                    <div id="">
                        <div class="form-group">
                            <label for="image">Upload your OwnerShip Certification</label>
                            <input type="file" class="form-control" id="image" name="image" >
                        </div>
                    </div>
                    <div id="image-fields">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                    </div>
                    <br><br>

                    <button type="submit" class="btn btn-danger">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to add new image input fields
        document.getElementById('add-image').addEventListener('click', function () {
            var imageFields = document.getElementById('image-fields');
            var imageCount = imageFields.children.length + 1; // Counting the existing image fields

            var newDiv = document.createElement('div');
            newDiv.className = 'form-group';

            var newLabel = document.createElement('label');
            newLabel.setAttribute('for', 'images');
            newLabel.textContent = 'Image ' + imageCount;

            var newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.className = 'form-control';
            newInput.name = 'images[]';
            newInput.multiple = true;

            newDiv.appendChild(newLabel);
            newDiv.appendChild(newInput);

            imageFields.appendChild(newDiv);
        });
    </script>
    <style>
        .btn-danger{
      border-color:#f0d892 ; background-color:#f0d892 ;
     }
     .btn-danger:hover{
      background-color: black;
      border-color: black;
     }
    </style>


</body>
@endsection
