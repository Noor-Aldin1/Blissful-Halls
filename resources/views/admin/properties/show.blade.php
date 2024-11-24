@extends('layouts.master')

@section('content')
<body>
    <div class="container" style="width: 100%">
        <div class="row justify-content-center">
            <div class="col-sm-15">
                <div >
                    <a href="{{ route('admin.properties.index') }}" style="margin-right: 5%" class="btn btn-dark mt-2">Back to properties table</a><br><br>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Lessor </th>
                            {{-- <th>Description</th> --}}
                            <th>Address</th>
                            <th>Availability</th>
                            <th>Capacity</th>
                            <th>Price per Day</th>
                            <th>Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $property->name }}</td>
                            <td>{{ $property->category->name }}</td>
                            <td>{{ $property->lessor->user->name }}</td>
                            {{-- <td>{{ $property->description }}</td> --}}
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->availability ? 'Available' : 'Not Available' }}</td>
                            <td>{{ $property->capacity }}</td>
                            <td>${{ number_format($property->price_per_full_day, 2) }}</td>
                            <td>
                                <div class="image-gallery">
                                    @foreach($property->property_images as $image)
                                        <img  style="width:120px;" src="/storage/{{ $image->image }}" alt="Property Image">
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
