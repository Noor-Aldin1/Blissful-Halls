<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        // Ensure that the user is authenticated for the store method
        $this->middleware('auth')->only('store');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
        }

        // Create the review
        Review::create([
            'property_id' => $request->input('property_id'),
            'user_id' => Auth::id(), // Get the ID of the authenticated user
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
