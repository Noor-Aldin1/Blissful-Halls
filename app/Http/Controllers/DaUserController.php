<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaUserController extends Controller
{
    // عرض جميع المستخدمين مع role_id = 1
    public function index()
    {
        $users = User::where('role_id', 1)->get();
        return view('admin.users.index', compact('users'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('admin.users.create');
    }

    // تخزين مستخدم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1; // تحديد الدور كـ Admin

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // عرض بيانات المستخدم المحدد
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // عرض نموذج تعديل مستخدم موجود
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم المحدد في قاعدة البيانات
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
