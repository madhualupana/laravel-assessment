<?php

namespace App\Http\Controllers;

use App\Events\UserSaved;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Http\Request;

class Assessment1Controller extends Controller
{
    public function index()
    {
        $users = User::with('details')->get();
        return view('assessment1.index', compact('users'));
    }

    public function create()
    {
        return view('assessment1.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'prefixname' => 'nullable|string',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'suffixname' => 'nullable|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'photo' => 'nullable|string',
            'type' => 'nullable|string',
            'password' => 'required|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect()->route('assessment1.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('assessment1.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('assessment1.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'prefixname' => 'nullable|string',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'suffixname' => 'nullable|string',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|string',
            'type' => 'nullable|string',
            'password' => 'nullable|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('assessment1.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('assessment1.index')->with('success', 'User deleted successfully.');
    }
}