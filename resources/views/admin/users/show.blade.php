@extends('layouts.master')

@section('content')
<body>

    <div class="container">

                <h1>User Details</h1>
                <div><br>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-dark mt-2">Back to users table</a><br><br>
                </div>


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>

                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="img-thumbnail" width="150">
                                @else
                                    <p>No Photo Available</p>
                                @endif
                                </td>


                            </tr>


                    </tbody>
                </table>

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



