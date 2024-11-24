@extends('layouts.master')

@section('content')
<style>
       .btn-danger{
     border-color:rgb(220,167,58) ; background-color:rgb(220,167,58) ;
    }
    .btn-danger:hover{
     background-color: black;
     border-color: black;
    }
</style>
<div class="container">
    <h3 class="my-4">All Lessors</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <a class="btn btn-dark mt-2" href="{{ route('admin.lessors.create') }}">New Lessor</a>
    </div>

    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessors as $lessor)
                <tr>
                    <td>{{ $lessor->id }}</td>
                    <td>{{ $lessor->name }}</td>
                    <td>{{ $lessor->email }}</td>
                    <td>{{ $lessor->lessor->phone_num }}</td>
                    <td>{{ $lessor->lessor->address }}</td>
                    <td>
                        @if($lessor->Photo)
                            <img src="{{ asset('storage/' . $lessor->Photo) }}" alt="Photo" width="50">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.lessors.show', $lessor->id) }}" class="btn btn-danger">View</a>
                        <a href="{{ route('admin.lessors.edit', $lessor->id) }}" class="btn btn-danger">Edit</a>
                        <form action="{{ route('admin.lessors.destroy', $lessor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
