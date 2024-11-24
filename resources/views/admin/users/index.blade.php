@extends('layouts.master')

@section('content')
<body>

    <div class="container">


                <h3 class="my-4">All Users</h3>
                <div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-dark mt-2">New User</a>
                </div><br>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->Photo)
                                        <img src="{{ asset('storage/' . $user->Photo) }}" alt="Photo" width="50">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-danger">View</a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-danger">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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
