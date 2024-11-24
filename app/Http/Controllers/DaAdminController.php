<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;

class DaAdminController extends Controller

{
    public function showProfile()
    {
        $data = AUTH::user();
        /* $admin =  [
            'name' => $data->name,
            'email' => $data->email,

        ]; */
        //dd($admin);
        return view('admin.show', [
            'name' => $data->name,
            'email' => $data->email,

        ]);
    }


    // public function editProfile()
    // {
    //     $admin = auth()->user();
    //     return view('admin.edit', compact('admin'));
    // }
    public function editProfile()
    {

        $data = AUTH::user();
        $admin = AUTH::user();


        return view('admin.edit', compact('admin'));
    }



    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        ]);

        $admin->update($validatedData);

        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully!');
    }

    public function deleteProfile()
    {
        $admin = auth()->user();
        $admin->delete();

        return redirect('/')->with('success', 'Profile deleted successfully!');
    }


    // -------ششششششششششششششششششششششششششششششششششششششششششششششششششششششش
    // ششششششششششششششششششششششششششششششششششششششششششششششششششششش---------------------------





    public function pendingProperties()
    {
        $properties = Property::where('auth', 'pending')->get();
        return view('admin.pending_properties', compact('properties'));
    }
    public function approveProperty($id)
    {
        $property = Property::find($id);
        $property->auth = 'certified';
        $property->save();

        return redirect()->back()->with('success', 'Property approved successfully.');
    }

    public function rejectProperty($id)
    {
        $property = Property::find($id);
        $property->auth = 'rejected';
        $property->save();

        return redirect()->back()->with('success', 'Property rejected successfully.');
    }


    // ------ACECEPTED--------------

    public function acceptedProperties()
    {
        $properties = Property::where('auth', 'certified')->get();
        return view('admin.accepted_properties', compact('properties'));
    }

    public function pendProperty($id)
    {
        $property = Property::find($id);
        $property->auth = 'pending';
        $property->save();

        return redirect()->back()->with('success', 'Property status set to pending.');
    }

    public function rejectedProperties()
    {
        $properties = Property::where('auth', 'rejected')->get();
        return view('admin.rejected_properties', compact('properties'));
    }
    ////--------------


   ////--------------


   public function dashboard()
   {
       $availableHalls = Property::where('availability', 1)->count();

       $newClients = User::count();

       $totalBookings = Booking::count();
       $canceledBookings = Booking::where('status', 'canceled')->count();
       $cancellationRate = $totalBookings > 0 ? ($canceledBookings / $totalBookings) * 100 : 0;

       $totalRevenue = Booking::where('status', 'completed')->sum('total_price');

       $monthlyBookings = Booking::selectRaw('MONTH(date) as month, COUNT(*) as bookings')
           ->groupBy('month')
           ->pluck('bookings', 'month');

       $monthlyRevenue = Booking::selectRaw('MONTH(date) as month, SUM(total_price) as revenue')
           ->groupBy('month')
           ->pluck('revenue', 'month');

       return view('admin.adminDashboard', compact(
           'availableHalls',
           'newClients',
           'cancellationRate',
           'totalRevenue',
           'monthlyBookings',
           'monthlyRevenue'
       ));
   }
}



