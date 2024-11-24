@extends('layouts.master')
@section('content')

    <div class="container" style="width: 100%">
        <h3>All Bookings</h3>
        <a class="btn btn-dark mt-2" href="{{ route('bookings.create') }}">Create New Booking</a>
        <br><br>
        <table style="width: 100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Property</th>
                    <th>Date</th>
                    <th>Total Price</th>
                    <th>Time Slot</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->property->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->total_price }}</td>
                        <td>{{ $booking->time_slot }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('bookings.edit', $booking->id) }}">Edit</a>

                            <!-- Form and button inline -->
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .btn-danger {
            border-color: #f0d892;
            background-color: #f0d892;
        }

        .btn-danger:hover {
            background-color: black;
            border-color: black;
        }

        /* Ensure form and buttons are inline */
        td .btn, td form {
            display: inline-block;
            margin-left: 5px;
        }
    </style>

@endsection
