<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LessorRegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register-lessor');
    }

    /**
     * Handle the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // if (session('role') != 1) {
        //     return view('user.signin');
        // }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'phone_num' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2; // Assuming '2' is the role ID for lessors
        $user->save();

        // Create lessor
        $lessor = new Lessor();
        $lessor->phone_num = $request->phone_num;
        $lessor->address = $request->address;
        $lessor->user_id = $user->id;
        $lessor->save();

        return redirect()->route('lessor.dashboard')->with('status', 'Registration successful! Welcome.');
    }

    /**
     * Show the update form.
     *
     * @return \Illuminate\View\View
     */
    public function showUpdateForm()
    {
        $lessor = auth()->user(); // Assuming the Lessor is authenticated directly

        return view('auth.update-lessor', compact('lessor'));
    }

    /**
     * Handle the update request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $lessor = auth()->user(); // Assuming the Lessor is authenticated directly

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $lessor->id,
            'password' => 'nullable|confirmed|min:6',
            'phone_num' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user info
        $lessor->name = $request->name;
        $lessor->email = $request->email;

        if ($request->filled('password')) {
            $lessor->password = Hash::make($request->password);
        }

        $lessor->phone_num = $request->phone_num;
        $lessor->address = $request->address;
        $lessor->save();

        return redirect()->route('lessor.dashboard')->with('status', 'Profile updated successfully!');
    }
}