@extends('layouts.master')

@section('content')
<style>
    .container {
        max-width: 1000px;
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

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-success {
        background-color: #ffc107;
        color: #fff;
        border: none;
    }

    .btn-success:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #5a6268;
        color: #fff;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .alert {
        padding: 10px 15px;
        background-color: #d4edda;
        color: #155724;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .ttt{
        display: inline;

      padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-decoration: none;
        margin-left: 5px;
        transition: background-color 0.3s ease;

     }
     .bt{
        display: inline;
        margin-left: 30.5%;


     }
</style>

<div class="container mt-4">
    <h2 style="display: inline">Accepted Properties</h2>
 <div class="bt">
    <a class="btn btn-dark mt-2" href="{{ route('admin.properties.pending') }}" >Pending</a>
        <a class="btn btn-dark mt-2" href="{{ route('admin.properties.rejected') }}" >Rejected</a>
        </div>
<br> <br>
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
                <th>doc</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>
                        {{ $property->name }} <br>
                        <a href="javascript:void(0);" onclick="toggleDetails({{ $property->id }})" class="btn btn-link">View Details</a>
                    </td>
                    <td>{{ $property->address }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $property->image) }}" alt="property image" width="100">
                    </td>
                    <td>
                        <form action="{{ route('admin.properties.pend', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">Pend</button>
                        </form>
                        <form action="{{ route('admin.properties.reject', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
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
<br> <br>
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
