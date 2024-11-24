@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <h1 class="my-4">Create New Booking</h1>
            <form id="bookingForm" action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user">User</label>
                    <select class="form-control" id="user" name="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="property">Property</label>
                    <select class="form-control" id="property" name="property_id">
                        <option value="">Select Property</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="time_slot">Available Time Slot</label>
                    <select name="time_slot" class="form-control" id="time_slot">
                        @foreach($availableSlots as $slot)
                            <option value="{{ $slot }}">
                                {{ ucfirst($slot) }}
                            </option>
                        @endforeach
                    </select>
                    @error('time_slot')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                

                <button type="submit" class="btn btn-danger">Create</button>
            </form>
        </div>
    </div>
</div>

{{-- كود الـ AJAX --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#property, #date').change(function() {
            var propertyId = $('#property').val();
            var date = $('#date').val();

            if (propertyId && date) {
                // إرسال طلب AJAX لجلب الفترات الزمنية المتاحة والسعر الكلي
                $.ajax({
                    url: '{{ route("bookings.fetchAvailableSlots") }}',
                    type: 'GET',
                    data: {
                        property_id: propertyId,
                        date: date
                    },
                    success: function(response) {
                        // تحديث الفترات الزمنية المتاحة
                        var timeSlotSelect = $('#time_slot');
                        timeSlotSelect.empty();

                        if (response.availableSlots.length > 0) {
                            $.each(response.availableSlots, function(key, slot) {
                                timeSlotSelect.append(new Option(slot, slot));
                            });
                        } else {
                            timeSlotSelect.append(new Option('No available slots', ''));
                        }

                        // تحديث السعر الكلي
                        $('#totalPrice').text('$' + response.totalPrice.toFixed(2));
                    }
                });
            }
        });
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
