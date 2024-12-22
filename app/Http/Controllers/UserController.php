<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $usertype = UserType::all(); 
        $users = User::with('userType') // Eager load the userType relationship
                    ->when($request->usertype_id, function($query) use ($request) {
                        return $query->where('usertype_id', $request->usertype_id);
                    })
                    ->get();

        return view('admin.view_user', compact('users', 'usertype'));
    }

    public function create()
    {
        $usertype = Usertype::all();
        return view('admin.create_user', compact('usertype'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'usertype_id' => 'required|exists:usertypes,id',
        ]);

        // Create the user
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'usertype_id' => $request->usertype_id,
        ]);

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
