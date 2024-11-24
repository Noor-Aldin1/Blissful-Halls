@extends('properties.navigation')

@section('content')
    <div class="property-details">
        <h1>Property Details</h1>

        @if ($property)
            <div class="details-table">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $property->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $property->name }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $property->location }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $property->address }}</td>
                    </tr>
                    <tr>
                        <th>Price Per Hour</th>
                        <td>${{ number_format($property->price_per_hour, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Availability</th>
                        <td>{{ $property->availability ? 'Available' : 'Not Available' }}</td>
                    </tr>
                    <tr>
                        <th>Capacity</th>
                        <td>{{ $property->capacity }} people</td>
                    </tr>
                </table>
            </div>

            <!-- Reviews Section -->
            <div class="reviews-section">
                <h2>Reviews</h2>

                @if ($property->reviews->isEmpty())
                    <p class="no-reviews">No reviews for this property.</p>
                @else
                    <table class="table reviews-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Rating</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($property->reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->user_id }}</td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $review->rating >= $i ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </td>
                                    <td>{{ $review->comment }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Review Form -->
            <div class="review-form-section">
                <h2>Leave a Review</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <div class="rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" required>
                                <label for="star{{ $i }}" class="star"><i class="fas fa-star"></i></label>
                            @endfor
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>

            <!-- Booking Section -->
            <div class="booking-section">
                <h2>Check In</h2>

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}">

                    <div class="form-group">
                        <label for="property">Property:</label>
                        <select name="property_id" id="property" class="form-control">
                            <option value="{{ $property->id }}" selected>{{ $property->name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="datepicker">Date:</label>
                        <input id="datepicker" name="date" type="text" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="time_slot">Time Slot:</label>
                        <select name="time_slot" id="time_slot" class="form-control" required>
                            <option value="">Select Time Slot</option @readonly(true)>
                            <option value="fullday">Full Day</option>
                            <option value="afternoon">Afternoon</option>
                            <option value="night">Night</option>
                        </select>
                        <p id="no-available-slots" style="display:none;color:red;">No available time slots for the selected date.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @else
            <p class="property-not-found">Property not found.</p>
        @endif

        <a href="{{ route('properties.index') }}" class="btn btn-secondary back-btn">Back to List</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var propertyId = $('#property_id').val();

            function fetchAvailability(propertyId) {
                $.ajax({
                    url: '{{ url("/api/bookings/availability") }}/' + propertyId,
                    method: 'GET',
                    success: function(data) {
                        var dateAvailability = data.dateAvailability || {};

                        $("#datepicker").datepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: 0,
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
                                var availability = dateAvailability[selectedDate];

                                if (!availability) {
                                    console.log("No availability data found for", selectedDate);
                                    return;
                                }

                                var availableSlots = availability.availableSlots;

                                if (!availableSlots) {
                                    console.log("No available slots data for", selectedDate);
                                    return;
                                }

                                console.log("Available Slots for " + selectedDate + ":", availableSlots);

                                // Reset and enable all options first
                                $('#time_slot option').each(function() {
                                    var slot = $(this).val();
                                    var isAvailable = availableSlots[slot];
                                    console.log("Slot:", slot, "isAvailable:", isAvailable);
                                    $(this).prop('disabled', !isAvailable);
                                });

                                // Custom logic to hide 'Full Day' option if only 'Afternoon' or 'Night' is available
                                if (availableSlots.afternoon && !availableSlots.night) {
                                    // If only afternoon is available, hide 'Full Day' option
                                    $('#time_slot option[value="fullday"]').hide();
                                } else if (!availableSlots.afternoon && availableSlots.night) {
                                    // If only night is available, hide 'Full Day' option
                                    $('#time_slot option[value="fullday"]').hide();
                                } else {
                                    // If both or none are available, show 'Full Day' option
                                    $('#time_slot option[value="fullday"]').show();
                                }

                                // Additional logic for specific scenario on 2024-08-25
                                if (selectedDate === '2024-08-25') {
                                    if (!availableSlots.afternoon && availableSlots.night) {
                                        $('#time_slot option[value="fullday"]').hide();
                                        $('#time_slot option[value="night"]').prop('disabled', false);
                                    } else if (availableSlots.afternoon && !availableSlots.night) {
                                        $('#time_slot option[value="fullday"]').hide();
                                        $('#time_slot option[value="afternoon"]').prop('disabled', false);
                                    }
                                }

                                // Check if all slots are unavailable
                                var allDisabled = $('#time_slot option:disabled').length === $('#time_slot option').length;
                                if (allDisabled) {
                                    $('#time_slot').prop('disabled', true);
                                    $('#no-available-slots').show();
                                } else {
                                    $('#time_slot').prop('disabled', false);
                                    $('#no-available-slots').hide();
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            fetchAvailability(propertyId);

            $('#property').change(function() {
                propertyId = $(this).val();
                fetchAvailability(propertyId);
            });
        });
        </script>


    <style>
        /* General Page Styling */
        .property-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        /* Reviews Section Styling */
        .reviews-section {
            margin-top: 40px;
        }

        .reviews-table .fas.fa-star {
            font-size: 1.2rem;
        }

        .no-reviews {
            font-style: italic;
            color: #666;
        }

        /* Review Form Styling */
        .review-form-section {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: #fff;
        }

        .back-btn {
            margin-top: 20px;
            display: inline-block;
        }

        /* Booking Section Styling */
        .booking-section {
            margin-top: 40px;
        }

        /* Rating Star Styling */
        .rating {
            display: flex;
            direction: row-reverse;
            font-size: 1.5rem;
            justify-content: center;
            position: relative;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ddd;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover ~ label {
            color: #f39c12;
        }

        .rating input:checked ~ label {
            color: #f39c12;
        }

        /* Datepicker Styling */
        .ui-state-booked {
            background: red !important;
            color: white;
        }

        .ui-datepicker {
            width: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
