<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use App\Models\Lessor;
use App\Models\Property_image;
use Illuminate\Http\Request;

class DaPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('auth', 'certified')->get();
        return view('admin.properties.index', compact('properties'));
    }
    // public function index()
    // {
    //     $properties = Property::where('availability', '0')->get();

    // return redirect()->route('properties.index')->with('success', 'Property approved successfully.');
    // }

    public function create()
    {
        $categories = Category::all();
        $lessors = Lessor::all();
        return view('admin.properties.create', compact('categories', 'lessors',));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price_per_full_day' => 'required|numeric',
            'availability' => 'required|boolean',
            'auth' => 'in:rejected,certified,pending',
            'capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'lessor_id' => 'required|exists:lessors,id',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Handle the single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('property_images', 'public'); // Store image
        }

        // Create the property with the uploaded image path
        $property = Property::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'price_per_full_day' => $request->input('price_per_full_day'),
            'availability' => $request->input('availability'),
            'auth' => $request->input('auth'),
            'capacity' => $request->input('capacity'),
            'category_id' => $request->input('category_id'),
            'lessor_id' => $request->input('lessor_id'),
            'image' => $imagePath // Save the image path
        ]);

        // Handle multiple images
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('property_images', 'public'); // Store image
                Property_image::create([
                    'property_id' => $property->id, // Access the ID from the created property
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }


    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $categories = Category::all();
        $lessors = Lessor::all();

        return view('admin.properties.edit', compact('property', 'categories', 'lessors'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price_per_full_day' => 'required|numeric',
            'availability' => 'required|boolean',
            'auth' => 'in:rejected,certified,pending',
            'capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'lessor_id' => 'required|exists:lessors,id',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'images' => 'nullable|array|min:1',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Retrieve the property to be updated
        $property = Property::findOrFail($id);

        // Handle single image update
        if ($request->hasFile('image')) {
            // Remove the old image path from the database
            $property->image = null;

            // Store the new image
            $newImage = $request->file('image');
            $newImagePath = $newImage->store('property_images', 'public');
            $property->image = $newImagePath;
        }

        // Update property data
        $property->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'price_per_full_day' => $request->input('price_per_full_day'),
            'availability' => $request->input('availability'),
            'auth' => $request->input('auth'),
            'capacity' => $request->input('capacity'),
            'category_id' => $request->input('category_id'),
            'lessor_id' => $request->input('lessor_id'),
        ]);

        // Handle multiple image update
        if ($request->hasFile('images')) {
            // Remove old property images from the database
            foreach ($property->property_images as $propertyImage) {
                $propertyImage->delete();
            }

            // Store new images
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('property_images', 'public');
                Property_image::create([
                    'property_id' => $property->id,
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }
}
