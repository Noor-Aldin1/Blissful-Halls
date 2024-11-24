@extends('layouts.BasicView')

@section('content')
<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">

            <!-- Sidebar Area -->
            <div class="col-lg-3">
                <div class="service-side-bar">
                    <div class="services-bar-widget">
                        <h3 class="title">Personal Information</h3>
                        <div class="side-bar-categories">
                            <!-- Ensure user is authenticated and photo path is correctly set -->
                            <img src="{{ asset('storage/' . auth()->user()->Photo) }}" class="rounded mx-auto d-block" alt="Image" style="width: 100px; height: 100px">
                            <br><br>

                            <ul>
                                <li>
                                    <a href="{{ route('usprofile') }}">User Profile </a>
                                </li>
                                <li>
                                    <a href="{{ route('mybooking', ['id' => auth()->user()->id]) }}">Booking Details </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout')}}" method="POST">
                                        @csrf
                                        <button style="width: 100%;     padding: 0; text-align: left; " type="submit"><a  > logout</a> </button> 
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Area End -->

            <div class="col-lg-9">
    @if($bookings->isEmpty())
        <p>No bookings found for this user.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Property Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Slot</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $booking->property->name }}</td>
                        <td class="booking-date" data-date="{{ $booking->date }}">{{ $booking->date }}</td>
                        <td>{{ ucfirst($booking->time_slot) }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>${{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            @if($booking->status == 'pending')
                                <button class="btn btn-danger btn-sm cancel-btn" data-booking-id="{{ $booking->id }}" type="button">Cancel</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

        </div>
    </div>
</div>
<!-- Service Details Area End -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const today = new Date(); // Get today's date
        const cancelButtons = document.querySelectorAll('.cancel-btn');

        cancelButtons.forEach(button => {
            const bookingDateStr = button.closest('tr').querySelector('.booking-date').dataset.date;
            const bookingDate = new Date(bookingDateStr); // Convert booking date string to Date object

            // Calculate the difference in days between today and the booking date
            const timeDiff = bookingDate.getTime() - today.getTime();
            const dayDiff = timeDiff / (1000 * 3600 * 24); // Convert time difference to days

            // Check if the booking date is today or within two days
            if (dayDiff <= 2) {
                button.disabled = true;
                button.title = "Cannot cancel bookings today or within two days.";
            } else {
                button.addEventListener('click', function () {
                    // SweetAlert2 confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you really want to cancel this booking?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, cancel it!',
                        cancelButtonText: 'No, keep it'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const bookingId = this.dataset.bookingId;

                            fetch(`/bookings/${bookingId}/cancel`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ _method: 'DELETE' })
                            })
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(data => {
                                        throw new Error(data.message || 'Network response was not ok');
                                    });
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Canceled!',
                                        'Booking canceled successfully.',
                                        'success'
                                    );
                                    this.closest('tr').remove(); // Remove the row
                                } else {
                                    Swal.fire(
                                        'Failed!',
                                        'Failed to cancel booking. Please try again.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while canceling the booking. Please try again.',
                                    'error'
                                );
                            });
                        }
                    });
                });
            }
        });
    });
</script>

@endsection
