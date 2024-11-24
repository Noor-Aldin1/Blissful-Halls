<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Property_image;
use App\Models\Property;
use App\Models\Category;
use App\Models\Booking;
use Carbon\Carbon;

class LessorController extends Controller
{
    public function dashboard()
    {
        $lessor = Auth::user()->lessor;
        $properties = $lessor->properties()->with(['property_images', 'bookings.user'])->get() ?? collect();

        // Automatically reject past pending bookings
        foreach ($properties as $property) {
            foreach ($property->bookings as $booking) {
                if ($booking->status == 'pending' && Carbon::parse($booking->date)->isPast()) {
                    $booking->status = 'rejected';
                    $booking->save();
                }
            }
        }

        $bookings = Booking::with(['property', 'user'])
            ->whereIn('property_id', $properties->pluck('id'))
            ->where('status', 'pending')
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy('property_id')
            ->map(function ($bookingGroup) {
                return $bookingGroup->first();
            });

        return view('lessors.dashboard', compact('lessor', 'properties', 'bookings'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('lessors.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_full_day' => 'required|numeric',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|array|min:4',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = new Property($validated);
        $property->lessor_id = Auth::user()->lessor->id;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('property_images', 'public');
            $property->image = $path;
        }
        $property->save();

        foreach ($request->file('images') as $image) {
            $path = $image->store('property_images', 'public');
            Property_image::create([
                'property_id' => $property->id,
                'image' => $path,
            ]);
        }

        return redirect()->route('lessor.dashboard')->with('success', 'Property created successfully.');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $categories = Category::all();

        return view('lessors.edit', compact('property', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_full_day' => 'required|numeric',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'removed_images' => 'nullable|string', // This will handle removed images
        ]);
        if (!$validated) {
            dd('Validation failed');
        }

        dd('Validation passed', $validated);;
        // Update property details
        $property->update($validated);

        // Handle main image update
        if ($request->hasFile('image')) {
            // Delete old main image if it exists
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $path = $request->file('image')->store('property_images/credentials', 'public');
            $property->image = $path;
            dd('property updated', $property);
            $property->save();
        }

        // Handle removed images
        if ($request->filled('removed_images')) {
            $removedImages = explode(',', $request->removed_images);
            foreach ($removedImages as $imageId) {
                $image = Property_image::findOrFail($imageId);
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('property_images', 'public');
                Property_image::create([
                    'property_id' => $property->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('lessor.dashboard')->with('success', 'Property updated successfully.');
    }


    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('lessor.dashboard')->with('success', 'Property deleted successfully.');
    }

    public function showBookings()
    {
        $lessor = Auth::user()->lessor;
        $bookings = Booking::whereIn('property_id', $lessor->properties->pluck('id'))->get();

        return view('lessors.bookings', compact('bookings'));
    }

    public function acceptBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $property_id = $booking->property_id;

        $booking->status = 'confirmed';
        $booking->save();

        $nextPendingBooking = Booking::where('property_id', $property_id)
            ->where('status', 'pending')
            ->orderBy('date', 'asc')
            ->first();

        return redirect()->back()->with([
            'success' => 'Booking accepted.',
            'nextPendingBooking' => $nextPendingBooking
        ]);
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $property_id = $booking->property_id;

        $booking->status = 'rejected';
        $booking->save();

        $nextPendingBooking = Booking::where('property_id', $property_id)
            ->where('status', 'pending')
            ->orderBy('date', 'asc')
            ->first();

        return redirect()->back()->with([
            'success' => 'Booking rejected.',
            'nextPendingBooking' => $nextPendingBooking
        ]);
    }

    public function toggleAvailability($id)
    {
        $property = Property::findOrFail($id);
        $property->availability = !$property->availability;
        $property->save();

        return redirect()->route('lessor.dashboard')->with('success', 'Property availability updated successfully.');
    }
}
