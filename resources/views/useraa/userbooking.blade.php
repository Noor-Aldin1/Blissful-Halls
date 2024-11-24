@extends('layouts.BasicView')
@section('title', 'Properties')
@section('content')
    <style>
        .comments-wrap {
            max-height: 300px;
            /* Adjust this value based on your design */
            overflow-y: auto;
            /* Makes the content scrollable if it overflows */
            border: 1px solid #ddd;
            /* Optional border for styling */
            padding: 15px;
            /* Optional padding */
            background-color: #f9f9f9;
            /* Optional background color */
        }

        .comments-wrap ul {
            list-style: none;
            /* Removes default list styling */
            padding: 0;
            /* Removes default padding */
        }

        .comments-wrap li {
            margin-bottom: 15px;
            /* Adds space between reviews */
            border-bottom: 1px solid #ddd;
            /* Adds a border between reviews */
            padding-bottom: 10px;
            /* Adds padding at the bottom */
        }

        .comments-wrap img {
            border-radius: 50%;
            /* Makes user images circular */
            width: 50px;
            /* Sets a fixed width for user images */
            height: 50px;
            /* Sets a fixed height for user images */
            margin-right: 10px;
            /* Adds space between image and text */
        }

        .comments-wrap h3 {
            margin: 0;
            /* Removes default margin */
            font-size: 16px;
            /* Adjust font size */
        }

        .comments-wrap p {
            margin: 5px 0;
            /* Adds margin above and below comments */
            font-size: 14px;
            /* Adjust font size */
        }

        .review-rating i {
            color: #ffd700;
            /* Gold color for stars */
        }
    </style>
    <!-- Room Details Area Start -->
    @if ($property)
        <div class="room-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="room-details-side">
                            <div class="side-bar-form">
                                <h3>Booking Sheet</h3>
                                <form action="{{ route('booking.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}">

                                    <div class="form-group">
                                        <label for="property">Property</label>

                                        <option disabled value="{{ $property->id }}" selected>{{ $property->name }}</option>

                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="datepicker">Check-in</label>
                                                <div class="input-group">
                                                    <input style="color: #000;" id="datepicker" name="date"
                                                        type="text" class="form-control" required />
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <i class="bx bxs-calendar"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-12  gg">
                                            <div class="form-group">
                                                <label for="time_slot">Period</label>
                                                <select name="time_slot" id="time_slot" class="form-control " required>
                                                    <option value="" disabled selected>Select Time Slot</option>
                                                    <option value="fullday">Full Day</option>
                                                    <option value="afternoon">Afternoon</option>
                                                    <option value="night">Night</option>
                                                </select>
                                                <p id="no-available-slots" style="display:none;color:red;">No available time
                                                    slots for the selected date.</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn btn-bg-three border-radius-5">Book
                                                Now</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="room-details-article">
                            <div class="room-details-slider owl-carousel owl-theme">
                                @foreach ($property->property_images as $image)
                                    <div class="room-details-item">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="Images" />
                                    </div>
                                @endforeach
                            </div>

                            <div class="room-details-title">
                                <h2>{{ $property->name }}</h2>
                                <ul>
                                    <li><b>Availability:
                                            {{ $property->availability ? 'Open for Booking' : 'Fully Booked' }}</b></li>
                                    <li><b>Location: {{ $property->location }}</b></li>
                                    <li><b>Address: {{ $property->address }}</b></li>
                                    <li><b>Capacity: {{ $property->capacity }}</b></li>
                                    <li><b>Price Full Day: {{ number_format($property->price_per_full_day, 2) }} $</b></li>
                                </ul>
                            </div>

                            <div class="room-details-content">
                                <p>{{ $property->description }}</p>
                            </div>

                            <h3 class="title">Comments</h3>
                            <div class="comments-wrap">
                                <ul>
                                    @foreach ($property->reviews as $review)
                                        <li>
                                            <img src="assets1/img/blog/blog-profile1.jpg" alt="User Image" />
                                            <h3>{{ $review->user->name }}</h3>
                                            <span>{{ $review->created_at->format('F d, Y, h:i A') }}</span>
                                            <p>{{ $review->comment }}</p>
                                            <div class="review-rating">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $review->rating)
                                                        <i class="bx bxs-star"></i>
                                                    @else
                                                        <i class="bx bx-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="room-details-review mt-5">
                                <h2>Clients Review and Ratings</h2>
                                <div class="review-rating">
                                    <h3>Your Rating:</h3>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bx bx-star" data-rating="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                                    <input type="hidden" name="rating" id="rating-value" value="0">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name="comment" class="form-control" cols="30" rows="8" required
                                                    placeholder="Write your review here..."></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn btn-bg-three">
                                                Submit Review
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var propertyId = $('#property_id').val();

            function fetchAvailability(propertyId) {
                $.ajax({
                    url: '{{ url('api/booking/') }}/' + propertyId,
                    method: 'GET',
                    success: function(data) {
                        var dateAvailability = data.dateAvailability || {};

                        $("#datepicker").datepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: 0,
                            beforeShowDay: function(date) {
                                var formattedDate = $.datepicker.formatDate('yy-mm-dd',
                                    date);
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
                                    console.log("No availability data found for",
                                        selectedDate);
                                    return;
                                }

                                var availableSlots = availability.availableSlots || {};
                                var hasAvailableSlots = Object.values(availableSlots).some(
                                    Boolean);

                                if (hasAvailableSlots) {
                                    $('.gg').show(); // Show the entire section
                                    $('#no-available-slots').hide();

                                    var isAfternoonAvailable = availableSlots.afternoon;
                                    var isNightAvailable = availableSlots.night;

                                    $('#time_slot').show(); // Ensure the select is shown
                                    $('#time_slot option').each(function() {
                                        var slot = $(this).val();
                                        if (slot === 'fullday') {
                                            // Hide 'Full Day' if other slots are available
                                            $(this).toggle(!isAfternoonAvailable &&
                                                !isNightAvailable);
                                        } else {
                                            // Show other slots if available
                                            $(this).prop('disabled', !
                                                availableSlots[slot]);
                                        }
                                    });

                                    // Show or hide 'Full Day' based on availability
                                    if (isAfternoonAvailable || isNightAvailable) {
                                        $('#time_slot option[value="fullday"]').hide();
                                    } else {
                                        $('#time_slot option[value="fullday"]').show();
                                    }

                                } else {
                                    $('.gg').hide(); // Hide the entire section
                                    $('#no-available-slots').show();
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






    {{-- -----------for comment and review -------------------- --}}
    <script>
        // JavaScript to handle star rating interaction
        document.querySelectorAll('.bx-star').forEach((star) => {
            star.addEventListener('click', function() {
                let rating = this.getAttribute('data-rating');
                document.getElementById('rating-value').value = rating;
                document.querySelectorAll('.bx-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('bxs-star'); // Filled star
                        s.classList.remove('bx-star'); // Empty star
                    } else {
                        s.classList.add('bx-star'); // Empty star
                        s.classList.remove('bxs-star'); // Filled star
                    }
                });
            });
        });
    </script>
@endsection
