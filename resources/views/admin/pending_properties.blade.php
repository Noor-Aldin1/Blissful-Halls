@extends('layouts.master')

@section('content')
<style>
    .container {
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    .table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-danger {
        border-color: rgb(220, 167, 58);
        background-color: rgb(220, 167, 58);
        color: white;
    }

    .btn-danger:hover {
        background-color: black;
        border-color: black;
    }

    /* Make forms inline-block to align buttons on the same line */
    td form {
        display: inline-block;
    }

    .alert {
        padding: 10px 15px;
        background-color: #d4edda;
        color: #155724;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .btn-danger{
  border-color:#f0d892 ; background-color:#f0d892 ;
 }
 .btn-danger:hover{
  background-color: black;
  border-color: black;
 }
</style>

<div class="container">
    <h3 style="display: inline">Pending Properties</h3>
    <div class="bt">
        <a href="{{ route('admin.properties.accepted') }}" class="btn btn-dark mt-2">Accepted</a>
        <a href="{{ route('admin.properties.rejected') }}" class="btn btn-dark mt-2">Rejected</a>
    </div>
    <br><br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Doc</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->address }}</td>
                    <td><img src="{{ asset('storage/' . $property->image) }}" alt="property image" width="100"></td>
                    <td>
                        <form action="{{ route('admin.properties.reject', $property->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="background-color: #f0d892">Reject</button>
                        </form>
                        <form action="{{ route('admin.properties.approve', $property->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="background-color: #f0d892">Approve</button>
                        </form>
                        <a href="javascript:void(0);" onclick="toggleDetails({{ $property->id }})" class="btn btn-danger" style="background-color: #f0d892">Details</a>
                    </td>
                </tr>

                <tr id="details-{{ $property->id }}" style="display:none;">
                    <td colspan="5">
                        <strong>Description:</strong> {{ $property->description }} <br>
                        <strong>Location:</strong> {{ $property->location }} <br>
                        <strong>Price Per Full Day:</strong> {{ $property->price_per_full_day }} <br>
                        <strong>Capacity:</strong> {{ $property->capacity }} <br>
                        <img src="{{ asset('storage/' . $property->image) }}" alt="property image" width="200">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleDetails(id) {
        var detailsRow = document.getElementById('details-' + id);
        if (detailsRow.style.display === 'none') {
            detailsRow.style.display = 'table-row';
        } else {
            detailsRow.style.display = 'none';
        }
    }
</script>

@endsection
