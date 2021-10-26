<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Dashboard.Users.index', compact('users'));
    }


    public function create()
    {
        return view('Dashboard.Users.add');
    }


    public function store(UserRequest $request)
    {
        $validatedData = $request->except(['password', 'image', 'password_confirmation', '_token']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect(route('dashboard.users.index'))
            ->with('success', 'User Added Succesfully');
    }


    public function show(User $user)
    {

    }


    public function edit(User $user)
    {
        return view('Dashboard.Users.edit')
            ->with('user', $user);
    }


    public function update(UserRequest $request, User $user)
    {
        $validatedData = $request->except(['password', 'image']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }
        $validatedData['password'] = Hash::make($request->password);

        $user->update($validatedData);

        return redirect(route('dashboard.users.index'))
            ->with('success', 'User Updated Succesfully');


    }

    public function destroy(User $user)
    {
        //Don't Remove The Cruurent User
        if (auth()->user()->id == $user->id)
            return redirect(route('dashboard.users.index'))
                ->with('error', 'You Cannont Delete Your MemberShip');

        $user->delete();
        return redirect(route('dashboard.users.index'))
            ->with('success', 'User Deleted Succesfully');
    }
}
