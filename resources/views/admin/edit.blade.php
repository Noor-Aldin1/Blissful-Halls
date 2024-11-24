@extends('layouts.master')

@section('content')
<style>
.profile-edit-card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 800px;
    margin: auto;
    text-align: center;
}

.profile-edit-card img {
    border-radius: 50%;
    margin-bottom: 20px;
    width: 180px;
    height: 180px;
    border: 4px solid #f0d892;
}

.profile-edit-card h4 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.profile-edit-card p {
    color: #6c757d;
    font-size: 16px;
    margin-bottom: 20px;
}

.profile-edit-card a {
    text-decoration: none;
    color: #f0d892;
}

.profile-edit-card .btn {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.profile-edit-card .btn-save {
    background-color: #f0d892;
    color: #ffffff;
    border: none;
}

.profile-edit-card .btn-save:hover {
    background-color: #e0a800;
}

.profile-edit-card .btn-cancel {
    background-color: #6c757d;
    color: #ffffff;
    border: none;
}

.profile-edit-card .btn-cancel:hover {
    background-color: #5a6268;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 16px;
    margin-bottom: 15px;
}

.form-control:focus {
    border-color: #f0d892;
    box-shadow: 0 0 8px rgba(240, 216, 146, 0.25);
}

</style>

<div class="profile-edit-card">
    <img src="{{ asset("storage/") . "/" . Auth()->user()->Photo }}" alt="Admin Avatar">
    <h4>Edit Profile</h4>
    <p>Admin</p>
    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="password" value="{{ $admin->password }}">
        </div>
        <button type="submit" class="btn btn-save">Save Changes</button>
        <a href="{{ route('admin.profile.show') }}" class="btn btn-cancel">Cancel</a>
    </form>
</div>
@endsection
