@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-6 text-center">Welcome, {{ $lessor->user->name }} to your Dashboard</h1>

        <!-- Success or Error Message -->
        @if (session('status'))
            <div class="mb-6">
                <div
                    class="{{ session('status') == 'accepted' ? 'bg-green-500' : 'bg-red-500' }} text-white text-center py-2 rounded">
                    Booking has been {{ session('status') }}.
                </div>
            </div>
        @endif

        <!-- Buttons Section -->
        {{-- <div class="flex justify-between items-center mb-6">
            <a href="{{ route('lessor.create') }}"
                style="background-color: #fd3d57;"
                class="text-white px-4 py-2 rounded hover:bg-red-600 active:bg-red-700 transition duration-200 ease-in-out">
                Create a New Property
            </a>
            <a href="{{ route('lessor.bookings') }}"
                style="background-color: #fd3d57;"
                class="text-white px-4 py-2 rounded hover:bg-red-600 active:bg-red-700 transition duration-200 ease-in-out">
                View All Bookings
            </a>
        </div> --}}

        <h2 class="text-xl font-semibold mb-4">Your Properties</h2>

        @if ($properties->isEmpty())
            <p class="text-gray-600">You have no properties listed. <a href="{{ route('lessor.create') }}"
                    style="color: #fd3d57;" class="hover:underline">Create one now</a>.</p>
        @else
            <div class="space-y-6">
                @foreach ($properties as $property)
                    <div
                        class="bg-white p-6 rounded-lg shadow-md flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                        <!-- Left Column: Property Images and Details -->
                        <div class="flex-1">
                            <!-- Property Images -->
                            <div class="grid grid-cols-2 gap-2 mb-4">
                                @foreach ($property->property_images as $image)
                                    @if (!Str::contains($image->image, 'credentials'))
                                        <!-- Exclude credentials folder images -->
                                        <img src="{{ asset('storage/' . $image->image) }}"
                                            class="h-40 w-full object-cover rounded-md transform transition duration-300 ease-in-out hover:scale-105"
                                            alt="Property Image">
                                    @endif
                                @endforeach
                            </div>

                            <!-- Property Details -->
                            <h3 class="text-lg font-semibold">{{ $property->name }}</h3>
                            <p class="text-gray-700">{{ $property->description }}</p>
                            <p class="text-gray-600 mt-2"><strong>Location:</strong> {{ $property->location }}</p>
                            <p class="text-gray-600"><strong>Address:</strong> {{ $property->address }}</p>
                            <p class="text-gray-600"><strong>Price per Full Day:</strong>
                                ${{ $property->price_per_full_day }}</p>
                            <p class="text-gray-600"><strong>Capacity:</strong> {{ $property->capacity }} people</p>
                            <p class="text-gray-600"><strong>Availability:</strong>
                                {{ $property->availability ? 'Yes' : 'No' }}</p>

                            @if ($property->auth == 'pending')
                                <p class="text-yellow-500 font-bold mt-4">*Awaiting Admin Approval</p>
                            @endif

                            <div class="mt-4">
                                <a href="{{ route('lessor.edit', $property->id) }}" style="background-color: #5bc0de;"
                                    class="text-white px-4 py-2 rounded hover:bg-blue-500 active:bg-blue-600 transition duration-200 ease-in-out">
                                    Edit
                                </a>
                                <form action="{{ route('lessor.toggleAvailability', $property->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" style="background-color: #f0ad4e;"
                                        class="text-white px-4 py-2 rounded hover:bg-yellow-500 active:bg-yellow-600 transition duration-200 ease-in-out">
                                        {{ $property->availability ? 'Set as Unavailable' : 'Set as Available' }}
                                    </button>
                                </form>
                                <form action="{{ route('lessor.destroy', $property->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" style="background-color: #d9534f;"
                                        class="text-white px-4 py-2 rounded hover:bg-red-500 active:bg-red-600 transition duration-200 ease-in-out"
                                        onclick="confirmDelete({{ $property->id }})">
                                        Delete
                                    </button>
                                </form>
                            </div>

                            <script>
                                function confirmDelete(propertyId) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "This action cannot be undone.",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('delete-form-' + propertyId).submit();
                                        }
                                    })
                                }
                            </script>

                        </div>

                        <!-- Right Column: Calendar and Most Recent Pending Booking -->
                        <div class="w-full lg:w-1/2">
                            <!-- Calendar -->
                            <div class="bg-gray-100 p-4 rounded-lg mb-4">
                                <h4 class="text-lg font-semibold mb-2">Calendar</h4>
                                <div id="calendar-{{ $property->id }}"></div> <!-- Unique ID for each calendar -->
                            </div>

                            <!-- Most Recent Pending Booking -->
                            <div class="bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                                <div>
                                    <h4 class="text-lg font-semibold mb-2">Most Recent Pending Booking</h4>
                                    @if ($bookings->has($property->id))
                                        <p class="text-gray-600">
                                            {{ $bookings[$property->id]->date }} -
                                            {{ $bookings[$property->id]->time_slot }} |
                                            <strong>User:</strong> {{ $bookings[$property->id]->user->name }} |
                                            <strong>Total Price:</strong> ${{ $bookings[$property->id]->total_price }}
                                        </p>
                                    @else
                                        <p class="text-gray-600">No pending bookings yet.</p>
                                    @endif
                                </div>
                                @if ($bookings->has($property->id))
                                    <div class="flex space-x-2">
                                        <form action="{{ route('lessor.dashboard.accept', $bookings[$property->id]->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded">Accept</button>
                                        </form>
                                        <form action="{{ route('lessor.dashboard.reject', $bookings[$property->id]->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Reject</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        @foreach ($properties as $property)
            var calendarEvents{{ $property->id }} = [
                @foreach ($property->bookings as $booking)
                    {
                        title: '{{ $booking->user->name }}',
                        start: '{{ $booking->date }}',
                        allDay: true,
                        backgroundColor: '{{ $booking->status == 'pending' ? '#ffc107' : ($booking->status == 'confirmed' ? '#28a745' : '#dc3545') }}',
                        textColor: '#fff',
                    },
                @endforeach
            ];

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar-{{ $property->id }}');

                if (calendarEl) {
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: calendarEvents{{ $property->id }}
                    });

                    calendar.render();
                }
            });
        @endforeach
    </script>
@endsection
