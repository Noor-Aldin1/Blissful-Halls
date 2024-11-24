<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class usUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("useraa.userinfo");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'Photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile photo upload if exists
        if ($request->hasFile('Photo')) {
            // Delete old photo if exists
            if ($user->Photo) {
                Storage::delete('public/' . $user->Photo);
            }

            // Store new photo in the 'property_images' directory
            $path = $request->file('Photo')->store('property_images', 'public');
            $user->Photo = $path;
        }

        // Save the user
        $user->save();

        // Redirect back with success message
        return back()->with('success', 'Profile updated successfully.');
    }
}
