<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(5); // التصفح عبر الصفحات

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
        return view('users.create');
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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123'),  // Default password (should be changed)
        ]);

        // Redirect to users list with success message
        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));  // Passing specific user to edit
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
        // Validation for updating user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,  // Exclude current user from unique check
        ]);

        // Find and update the user
        $user = User::findOrFail($id);
        $user->update($validated);

        // Redirect to users list with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user from the database.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect to users list with success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
