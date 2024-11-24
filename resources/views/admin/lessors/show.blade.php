@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="my-4">Lessor Details</h1>
    <a href="{{ route('admin.lessors.index') }}" class="btn btn-dark mt-2">Back to Lessors List</a><br><br>



<table class="table table-bordered">
    <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Image</th>

        </tr>
    </thead>
    <tbody>

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $lessor->address }}</td>
                <td>{{ $lessor->phone_num }}</td>
                <td>
                    @if($user->Photo)
                    <img src="{{ asset('storage/' . $user->Photo) }}" alt="Lessor Photo" class="img-thumbnail" width="150">
                @else
                    <p>No Photo Available</p>
                @endif
                </td>


            </tr>


    </tbody>
</table>

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
