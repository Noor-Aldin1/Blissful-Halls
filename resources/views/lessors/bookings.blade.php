@extends('layouts.app')

@section('content')
    <div class="w-full p-4 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">All Bookings</h1>
            {{-- <a href="{{ route('lessor.dashboard') }}" style="background-color: #fd3d57;" class="text-white px-4 py-2 rounded hover:bg-blue-600">Back to Dashboard</a> --}}
        </div>

        <div class="flex flex-col lg:flex-row justify-between space-y-4 lg:space-y-0 lg:space-x-4">
            <!-- Left Box: Pending and Active Bookings -->
            <div class="flex-1 bg-yellow-50 p-4 rounded-lg shadow-md">
                <!-- Pending Bookings -->
                <div class="mb-4">
                    <h3 class=" text-2xl font-semibold leading-7 mb-4">Pending Bookings</h3>
                    @if ($pendingBookings->isEmpty())
                        <p class="mt-1 text-sm leading-6 text-gray-600">No pending bookings.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="bg-yellow-100 text-md">
                                    <tr>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tl-lg">
                                            Property</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">User
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Date
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Time
                                            Slot</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Status
                                        </th>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tr-lg">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingBookings as $booking)
                                        <tr class="border-t">
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->property->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->user->name }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->date }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->time_slot }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->status }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                <div class="flex space-x-2">
                                                    <form action="{{ route('lessor.bookings.accept', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded">Accept</button>
                                                    </form>
                                                    <form action="{{ route('lessor.bookings.reject', $booking->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Reject</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <hr>
                <hr>
                <hr>

                <!-- Active Bookings -->
                <div class="mb-4">
                    <h3 class="text-2xl font-semibold leading-7 my-4">Active Bookings</h3>
                    @if ($activeBookings->isEmpty())
                        <p class="mt-1 text-sm leading-6 text-gray-600">No active bookings.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="bg-yellow-100 text-md">
                                    <tr>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tl-lg">
                                            Property</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">User
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Date
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Time
                                            Slot</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Status
                                        </th>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tr-lg">
                                            Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activeBookings as $booking)
                                        <tr class="border-t">
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->property->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->user->name }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->date }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->time_slot }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->status }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                ${{ $booking->total_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Box: Booking History -->
            <div class="flex-1 bg-white p-4 rounded-lg shadow-md bg-green-50 ">
                <div class="mb-4">
                    <h3 class="text-2xl font-semibold leading-7 mb-4">Booking History</h3>

                    <!-- Confirmed Bookings -->
                    @if ($confirmedHistoryBookings->isEmpty())
                        <p class="mt-1 text-sm leading-6 text-gray-600">No confirmed bookings in history.</p>
                    @else
                        <h4 class="text-lg font-semibold mb-2">Confirmed Bookings</h4>
                        <div class="overflow-x-auto mb-4">
                            <table class="table-auto w-full">
                                <thead class="bg-green-100 text-md">
                                    <tr>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tl-lg">
                                            Property</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">User
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Date
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Time
                                            Slot</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Status
                                        </th>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tr-lg">
                                            Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmedHistoryBookings as $booking)
                                        <tr class="border-t">
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->property->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->user->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->date }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->time_slot }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->status }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                ${{ $booking->total_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <hr>
                    <hr>
                    <hr>
                    <!-- Rejected Bookings -->
                    @if ($rejectedHistoryBookings->isEmpty())
                        <p class="mt-1 text-sm leading-6 text-gray-600">No rejected bookings in history.</p>
                    @else
                        <h4 class="text-lg font-semibold my-2">Rejected Bookings</h4>
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="bg-green-100 text-md">
                                    <tr>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tl-lg">
                                            Property</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">User
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Date
                                        </th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Time
                                            Slot</th>
                                        <th class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6">Status
                                        </th>
                                        <th
                                            class="text-left text-sm font-semibold leading-6 text-gray-900 p-2 w-1/6 rounded-tr-lg">
                                            Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rejectedHistoryBookings as $booking)
                                        <tr class="border-t">
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->property->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                {{ $booking->user->name }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->date }}</td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->time_slot }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">{{ $booking->status }}
                                            </td>
                                            <td class="p-2 text-sm leading-6 text-gray-900 w-1/6">
                                                ${{ $booking->total_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
