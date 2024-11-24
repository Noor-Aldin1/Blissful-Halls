<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var propertyId =1; //$('#property').val(); // Get the selected property ID

            function fetchAvailability(propertyId) {
                $.ajax({
                    url: '{{ url("/api/bookings/availability") }}/' + propertyId, // Adjusted to match the controller method route
                    method: 'GET',
                    success: function(data) {
                        var dateAvailability = data.dateAvailability || {};
                        console.log('Date Availability:', dateAvailability);

                        $("#datepicker").datepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: 0, // Prevent selecting past dates
                            beforeShowDay: function(date) {
                                var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                                var availability = dateAvailability[formattedDate] || {};

                                if (availability.isFullyBooked) {
                                    return [false, 'ui-state-booked', 'Booked'];
                                } else {
                                    return [true, '', ''];
                                }
                            },
                            onSelect: function(selectedDate) {
                                var availableSlots = (dateAvailability[selectedDate] || {}).availableSlots || {};

                                // Reset and enable all options first
                                $('#time_slot option').each(function() {
                                    $(this).prop('disabled', false);
                                });

                                // Disable options that are unavailable
                                if (!availableSlots.afternoon) {
                                    $('#time_slot option[value="afternoon"]').prop('disabled', true);
                                }
                                if (!availableSlots.night) {
                                    $('#time_slot option[value="night"]').prop('disabled', true);
                                }
                                if (!availableSlots.fullday) {
                                    $('#time_slot option[value="fullday"]').prop('disabled', true);
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            // Initialize datepicker and fetch availability for the initial property
            fetchAvailability(propertyId);

            // Handle property change
            $('#property').change(function() {
                propertyId = $(this).val();
                fetchAvailability(propertyId);
            });
        });
    </script>
    <style>
        .ui-state-booked {
            background: red !important;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Check In</h1>

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="property_id" id="property_id" value="{{ $propertyId }}">

        <label for="property">Property:</label>
        <select name="property_id" id="property">
            @foreach($properties as $property)
                <option value="{{ $property->id }}" {{ $property->id == $propertyId ? 'selected' : '' }}>
                    {{ $property->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="datepicker">Date:</label>
        <input id="datepicker" name="date" type="text" required />
        <br>

        <label for="time_slot">Time Slot:</label>
        <select name="time_slot" id="time_slot">
            <option value="afternoon">Afternoon</option>
            <option value="night">Night</option>
            <option value="fullday">Full Day</option>
        </select>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
