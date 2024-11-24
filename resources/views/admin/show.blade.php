@extends('layouts.master')

@section('content')
<style>
body {
    background-color: #f9f9f9;
    font-family: 'Roboto', sans-serif;
}

.profile-container {
    max-width: 800px;
    margin: 40px auto;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    padding: 30px;
    display: flex;
    align-items: center;
    position: relative;
}

.profile-container .profile-image {
    flex: 1;
    text-align: center;
    margin-right: 20px;
}

.profile-container .profile-image img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 4px solid  #f0d892
;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.profile-container .profile-details {
    flex: 2;
}

.profile-container .profile-details h4 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.profile-container .profile-details p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 15px;
}

.profile-container .profile-info {
    margin-top: 20px;
    font-size: 1rem;
    color: #555;
}

.profile-container .profile-info p {
    margin-bottom: 10px;
}

.profile-container .profile-info p strong {
    color:  #555
;
}

.profile-container .profile-actions {
    margin-top: 20px;
    text-align: left;
}

.profile-container .profile-actions a {
    background-color: #f0d892;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 600;
    transition: background-color 0.3s;
    display: inline-block;
    margin-top: 10px;
}

.profile-container .profile-actions a:hover {
    background-color: #f0d892;
}

</style>

<div class="profile-container">
    <div class="profile-image">
        <img src="{{ asset("storage/") . "/" . Auth()->user()->Photo }}" alt="Admin Avatar">
    </div>
    <div class="profile-details">
        <h4>{{ $name }}</h4>
        <p class="text-muted">Admin</p>
        <div class="profile-info">
            <p><strong>Email:</strong> {{ $email }}</p>
        </div>
        <div class="profile-actions">
            <a href="{{ route('admin.profile.edit') }}" class="btn ">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
