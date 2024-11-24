@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <h1 class="my-4">Edit Booking</h1>
            <form id="editBookingForm" action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="user">User</label>
                    <input type="text" class="form-control" value="{{ $booking->user->name }}" disabled>
                    <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                </div>

                <div class="form-group">
                    <label for="property">Property</label>
                    <select class="form-control" id="property" name="property_id">
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}" {{ $property->id == $booking->property_id ? 'selected' : '' }}>
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $booking->date }}">
                </div>

                <div class="form-group">
                    <label for="time_slot">Time Slot</label>
                    <select name="time_slot" class="form-control" id="time_slot">
                        @foreach($availableSlots as $slot)
                            <option value="{{ $slot }}" {{ $booking->time_slot == $slot ? 'selected' : '' }}>
                                {{ ucfirst($slot) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Update Booking</button>
            </form>
        </div>
    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   function fetchAvailableTimeSlots() {
    var propertyId = $('#property').val();
    var date = $('#date').val();

    if (propertyId && date) {
        $.ajax({
            url: '{{ route("bookings.fetchAvailableSlots") }}',
            type: 'GET',
            data: {
                property_id: propertyId,
                date: date
            },
            success: function(response) {
                var timeSlotSelect = $('#time_slot');
                timeSlotSelect.empty();

                $.each(response.availableSlots, function(key, slot) {
                    timeSlotSelect.append(new Option(slot, slot));
                });

                $('#totalPrice').text('$' + parseFloat(response.totalPrice).toFixed(2));
            }
        });
    }
}

$('#property, #date').change(function() {
    fetchAvailableTimeSlots();
});

$(document).ready(function() {
    fetchAvailableTimeSlots();
});
</script>

<style>
    .btn-danger {
        border-color: #f0d892;
        background-color: #f0d892;
    }

    .btn-danger:hover {
        background-color: black;
        border-color: black;
    }
</style>

@endsection
