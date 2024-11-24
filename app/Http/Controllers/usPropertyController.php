<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;

use Illuminate\Http\Request;

class usPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/usPropertyController.php

    public function index(Request $request)
    {
        $cities = Property::select('location')->distinct()->pluck('location');

        // Initialize the query builder
        $query = Property::query();


        // Retrieve the last 3 filtered properties
        $properties = $query->latest()->take(3)->get();

        // Retrieve all categories for the filter dropdown
        $categories = Category::all();

        // Pass data to the view
        return view('useraa.home', compact('properties', 'categories', 'cities'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function show($id)
    {
        $property = Property::with('property_images', 'reviews')->findOrFail($id);
        $averageRating = $property->reviews->avg('rating');
        $reviewCount = $property->reviews->count();

        //dd($property,$averageRating,$reviewCount);

        return view("useraa.userbooking", compact("property", 'averageRating', 'reviewCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }



    /*     public function filter(Request $request)
    {
        $query = Property::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('city')) {
            $query->where('location', $request->location);
        }

        $properties = $query->with('category', 'property_images')->get();
        $categories = Category::all();

        return view('home.welcome', compact('properties', 'categories'));
    } */

    /* public function search(Request $request)
    {
        $query = Property::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('city')) {
            $query->where('location', $request->city);
        }

        if ($request->filled('price_range')) {
            [$min, $max] = explode('-', $request->price_range);
            $query->whereBetween('price_per_full_day', [$min, $max]);
        }

        if ($request->filled('capacity')) {
            $capacity = str_replace('+', '', $request->capacity);
            $query->where('capacity', '>=', $capacity);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $properties = $query;

        return view('home.search', [
            'properties' => $properties,
            'categories' => Category::all(),
            'cities' => ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Madaba', 'Jerash', 'Ajloun', 'Karak', 'Tafila', 'Mafraq', 'Ma\'an', 'Salt'],
        ]);
 */




    public function search(Request $request)
    {
        $categories = Category::all();
        $cities = Property::select('location')->distinct()->pluck('location');

        $properties = Property::query()
            ->when($request->input('category'), function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($request->input('city'), function ($query, $city) {
                return $query->where('location', $city);
            })
            ->when($request->input('min_price'), function ($query, $minPrice) {
                return $query->where('price_per_full_day', '>=', $minPrice);
            })
            ->when($request->input('max_price'), function ($query, $maxPrice) {
                return $query->where('price_per_full_day', '<=', $maxPrice);
            })
            ->when($request->input('min_capacity'), function ($query, $minCapacity) {
                return $query->where('capacity', '>=', $minCapacity);
            })
            ->when($request->input('max_capacity'), function ($query, $maxCapacity) {
                return $query->where('capacity', '<=', $maxCapacity);
            })
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->where('auth', 'certified')
            ->where('availability', 1)
            ->paginate(6);
        //dd($categories, $categories);

        return view('useraa.properties', compact('categories', 'cities', 'properties'));
    }
}
