<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->age = $request->age;
        $result = $user->save();

        if ($result) {
            return 'User added successfully';
        } else {
            return 'No user saved';
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|integer|max:11',
            'password' => 'nullable|integer|max:255',
            'age' => 'nullable|integer',

        ]);

        $user->update($validatedData);
        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $delete = $user->delete();
        if ($delete) {
            return response()->json('User deleted successfully', 204);
        } else {
            return response()->json('Failed to delete the User', 500);
        }
    }
}
