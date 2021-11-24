<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * return all users
     */
    public function index()
    {
        $users = User::latest()->paginate(25);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Create new user Page
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'email' => ['required', 'string', 'max:191', 'email', 'unique:users'],
            'is_admin' => ['required', 'integer', 'min:0', 'max:3'],
            'password' => ['required', 'string', 'min:8', 'max:191']
        ]);

        if (User::create($data)) {
            return redirect()->route('admin.users.index')->with('success', 'User has been added successfully.');
        }
    }

    /**
     *
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     *
     */
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'is_admin' => ['required', 'integer', 'min:0', 'max:3']
        ]);

        if ($request->has('email')) {
            if ($request->email !== $user->email) {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:191', 'unique:users']
                ]);
            } else {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:191']
                ]);
            }

            $data['email'] = $request->email;
        }

        if ($request->has('password')) {
            if ($request->password != '') {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'max:191']
                ]);

                $data['password'] = Hash::make($request->password);
            }
        }

        if ($user->update($data)) {
            return redirect()->route('admin.users.index')->with('success', 'User has been modified successfully.');
        }
    }

    /**
     *
     */
    public function delete(User $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin.users.index')->with('failed', 'You cannot delete Admin.');
        }

        if ($user->delete()) {
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted successfully.');
        }
    }
}
