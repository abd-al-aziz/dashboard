<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the users with search functionality.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // استلام كلمة البحث من المستخدم
        $search = $request->input('search');
        
        // استعلام لجلب المستخدمين مع دعم البحث في name و email
        $users = Admin::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10); // التصفح عبر الصفحات

        // إرجاع العرض مع البيانات
        return view('users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created user in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation for creating a new user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Create new user
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123'),  // Default password (should be changed)
        ]);

        // Redirect to users list with success message
        return redirect()->route('admin.index')->with('success', 'Admin added successfully!');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));  // Passing specific user to edit
    }

    /**
     * Update the specified user in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validation for updating admin
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $id,  // Exclude current user from unique check
        ]);

        // Find and update the user
        $admin = Admin::findOrFail($id);
        $admin->update($validated);

        // Redirect to users list with success message
        return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified user from the database.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        // Delete the user
        $admin->delete();

        // Redirect to users list with success message
        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully!');
    }
}
