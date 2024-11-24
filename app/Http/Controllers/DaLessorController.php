<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaLessorController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $lessors = User::where("role_id", 2)->get();
        return view('admin.lessors.index', compact('lessors'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('admin.lessors.create');
    }

    // تخزين مستخدم جديد في قاعدة البيانات
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone_num' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);



        $user = new User();
        $user->name = $request->name;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }
        $user->save();

        $lessor = new Lessor();
        $lessor->phone_num = $request->phone_num;
        $lessor->user_id = $user->id;
        $lessor->address = $request->address;



        $lessor->save();


        return redirect()->route('admin.lessors.index')->with('success', 'Lessor created successfully.');
    }

    // عرض بيانات المستخدم المحدد
    public function show($id)
    {
        $user = User::find($id);
        $lessor = Lessor::where('user_id', $id)->first();

        return view('admin.lessors.show', compact('lessor', 'user'));
    }

    // عرض نموذج تعديل مستخدم موجود
    public function edit($id)
    {
        $user = User::find($id);
        $lessor = Lessor::where('user_id', $id)->first();
        //dd($user, $lessor);
        return view('admin.lessors.edit', compact('lessor', 'user'));
    }

    // تحديث بيانات المستخدم المحدد في قاعدة البيانات
    public function update(Request $request, $id)
    {
        // Fetch the actual lessor instance and the user instance, or fail with 404 if not found
        $lessor = lessor::where('user_id', $id)->firstOrFail(); // This should be 'Lessor' with a capital 'L' if you're following PSR naming conventions
        $user = User::findOrFail($id); // findOrFail() ensures a 404 response if the user is not found

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone_num' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update the user and lessor records
        $user->name = $request->name;
        $user->email = $request->email;
        $lessor->phone_num = $request->phone_num;
        $lessor->address = $request->address;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update photo if provided
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        // Save the updated records
        $user->save();
        $lessor->save();

        // Redirect back with success message
        return redirect()->route('admin.lessors.index')->with('success', 'Lessor updated successfully.');
    }



    // حذف مستخدم
    public function destroy($id)
    {
        $user = User::find($id);
        $lessor = Lessor::where('user_id', $id)->first();

        if (!($lessor && $user)) {
            dd($lessor, $user);
        }

        $lessor->delete();
        $user->delete();

        return redirect()->route('admin.lessors.index')->with('success', 'Lessor deleted successfully.');
    }
}
