<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $fullPrice;

    public function showCheckInForm($propertyId)
    {
        $property = Property::findOrFail($propertyId); // Fetch the specific property

        // Set the class property
        $this->fullPrice = $property->price_per_full_day;

        // Fetch booked dates and time slots for the specified property
        $bookedDates = Booking::where('property_id', $propertyId)
            ->where('status', 'booked')
            ->get()
            ->groupBy('date')
            ->map(function ($items) {
                $hasFullDay = $items->contains('time_slot', 'fullday');
                $hasAfternoon = $items->contains('time_slot', 'afternoon');
                $hasNight = $items->contains('time_slot', 'night');

                // Determine if the date is fully booked
                $isFullyBooked = $hasFullDay || ($hasAfternoon && $hasNight);

                return [
                    'isFullyBooked' => $isFullyBooked,
                    'availableSlots' => [
                        'afternoon' => ! $isFullyBooked && ! $hasAfternoon,
                        'night' => ! $isFullyBooked && ! $hasNight,
                        'fullday' => ! $isFullyBooked,
                    ],
                ];
            })
            ->toArray();

        return view('useraa.checkin', compact('property', 'bookedDates', 'propertyId'));
    }

    public function storeBooking(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string|in:afternoon,night,fullday',
        ]);

        // Fetch property and set fullPrice
        $property = Property::findOrFail($request->property_id);
        $this->fullPrice = $property->price_per_full_day;

        // Check if the date and time slot are available for the specified property
        $existingBookings = Booking::where('property_id', $request->property_id)
            ->where('date', $request->date)
            ->get();

        // Determine if the date should be treated as fully booked
        $hasFullDay = $existingBookings->contains('time_slot', 'fullday');
        $hasAfternoon = $existingBookings->contains('time_slot', 'afternoon');
        $hasNight = $existingBookings->contains('time_slot', 'night');
        $isFullyBooked = $hasFullDay || ($hasAfternoon && $hasNight);

        if ($isFullyBooked && $request->time_slot !== 'fullday') {
            return back()->with('error', 'Selected time slot is not available.');
        }

        // Calculate the total price based on the selected time slot
        $totalPrice = $this->calculateTotalPrice($request->time_slot);

        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a booking.');
        }

        // Store booking details in the database
        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'status' => 'pending',
            'total_price' => $totalPrice,
        ]);

        // Redirect to the checkout page
        return redirect()->route('checkout.page')->with([
            'property_id' => $request->property_id,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'total_price' => $totalPrice,
        ]);
    }

    public function checkoutPage()
    {
        // Retrieve booking details from session
        $propertyId = session('property_id');
        $date = session('date');
        $timeSlot = session('time_slot');
        $totalPrice = session('total_price');

        // Check if all required session data is available
        if (! $propertyId || ! $date || ! $timeSlot || ! $totalPrice) {
            // Redirect to home page with an error message
            return redirect()->route('home')
                ->with('error', 'Booking details not found.');
        }

        // Fetch the property or handle the case where it may not be found
        $property = Property::find($propertyId);
        if (! $property) {
            // Redirect to home page with an error message
            return redirect()->route('home')
                ->with('error', 'Property not found.');
        }

        // Return the checkout view with the booking details
        return view('checkout', compact('property', 'date', 'timeSlot', 'totalPrice'));
    }

    private function calculateTotalPrice($timeSlot)
    {
        switch ($timeSlot) {
            case 'afternoon':
                return $this->fullPrice * .6;
            case 'night':
                return $this->fullPrice * .7;
            case 'fullday':
                return $this->fullPrice;
            default:
                return $this->fullPrice;
        }
    }
}