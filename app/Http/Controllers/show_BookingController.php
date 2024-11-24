<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class show_BookingController extends Controller
{
    public function index()
    {
        $lessor = Auth::user()->lessor;

        // Pending bookings (status: pending)
        $pendingBookings = Booking::whereHas('property', function ($query) use ($lessor) {
            $query->where('lessor_id', $lessor->id);
        })->where('status', 'pending')->orderBy('date', 'asc')->get();

        // Active bookings (status: confirmed and date is in the future)
        $activeBookings = Booking::whereHas('property', function ($query) use ($lessor) {
            $query->where('lessor_id', $lessor->id);
        })->where('status', 'confirmed')->where('date', '>=', now()->format('Y-m-d'))->orderBy('date', 'asc')->get();

        // Confirmed history bookings (confirmed and date in the past)
        $confirmedHistoryBookings = Booking::whereHas('property', function ($query) use ($lessor) {
            $query->where('lessor_id', $lessor->id);
        })->where('status', 'confirmed')->where('date', '<', now()->format('Y-m-d'))->orderBy('date', 'desc')->get();

        // Rejected history bookings (rejected regardless of date)
        $rejectedHistoryBookings = Booking::whereHas('property', function ($query) use ($lessor) {
            $query->where('lessor_id', $lessor->id);
        })->where('status', 'rejected')->orderBy('date', 'desc')->get();

        return view('lessors.bookings', compact(
            'pendingBookings',
            'activeBookings',
            'confirmedHistoryBookings',
            'rejectedHistoryBookings'
        ));
    }

    public function acceptBooking($id)
    {
        $booking = Booking::find($id);

        // Check for overlapping bookings for the same property and time slot
        $overlappingBookings = Booking::where('property_id', $booking->property_id)
            ->where('date', $booking->date)
            ->where('time_slot', $booking->time_slot)
            ->where('status', 'confirmed')
            ->exists();

        if ($overlappingBookings) {
            // If overlapping, reject the booking
            $booking->status = 'rejected';
        } else {
            // Otherwise, confirm the booking
            $booking->status = 'confirmed';
        }

        $booking->save();

        return redirect()->route('lessor.bookings');
    }

    public function rejectBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->route('lessor.bookings');
    }
}
