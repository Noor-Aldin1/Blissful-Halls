<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class UserBooking_show_Controller extends Controller
{
    /**
     * Display a listing of the bookings for a specific user.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        // Fetch bookings based on user ID
        $pendingBookings = Booking::where('user_id', $userId)->where('status', 'pending')->get();
        $confirmedHistoryBookings = Booking::where('user_id', $userId)->where('status', 'confirmed')->get();
        $rejectedHistoryBookings = Booking::where('user_id', $userId)->where('status', 'rejected')->get();

        // Return a view with the bookings data
        return view('user.userbookings', compact('pendingBookings', 'confirmedHistoryBookings', 'rejectedHistoryBookings'));
    }

    public function cancel(Request $request, $id)
    {
        // Find the booking by ID
        $booking = Booking::find($id);

        if ($booking && $booking->status == 'pending') {
            // Update status to canceled
            $booking->status = 'canceled';
            $booking->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Booking not found or not pending.']);
    }
}
