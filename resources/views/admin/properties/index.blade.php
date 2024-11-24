@extends('layouts.master')

@section('content')

<body>
    <div class="container" >
        <h3>All Properties</h3>
        <div>
            <a class="btn btn-dark mt-2" href="{{route('admin.properties.create')}}" >New Property</a>
            <br><br>
        </div>
        <div>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        </div>
        <table style="width: 100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Price per day</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->address }}</td>
                        <td>${{ number_format($property->price_per_full_day, 2) }}</td>
                        <td>{{ $property->capacity }}</td>
                        <td>
                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-danger">Edit</a>
                            <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-danger">Details</a>

                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>ِ
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
