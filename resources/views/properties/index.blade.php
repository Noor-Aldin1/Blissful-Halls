@extends('properties.navigation')

@section('content')
    <h1>Properties</h1>
    <a href="{{ route('properties.create') }}" class="btn btn-primary">Add New Property</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Address</th>
                <th>Price Per Hour</th>
                <th>Availability</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->location }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->price_per_hour }}</td>
                    <td>{{ $property->availability ? 'Available' : 'Not Available' }}</td>
                    <td>{{ $property->capacity }}</td>
                    <td>
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

