<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Get all input data
        $input = $request->all();
    
        // Create the user and hash the password
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);
    
        // Assign roles to the user (assuming roles are predefined and passed in the request)
        $user->assignRole($input['roles']); // Using assignRole method
    
        // Redirect to user index with success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }
    

    
    


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Manually checking and retrieving request data without using validation
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $roles = $request->input('role'); // assuming 'role' is a field with multiple roles
    
        // Update user data (except password if not provided)
        $user->name = $name;
        $user->email = $email;
    
        // Only update the password if a new one is provided
        if (!empty($password)) {
            $user->password = bcrypt($password);
        }
    
        // Save the user data
        $user->save();
    
        // Sync the user's roles (replaces old roles with new ones)
        $user->assignRole($roles);
    
        // Redirect back with success message
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    
}
