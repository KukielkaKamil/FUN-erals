<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $workers = User::all();
        return view('dashboard.workers', ['workers' => $workers]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('dashboard.edit.worker', ['worker' => $user]);
    }
    public function add()
    {
        $this->authorize('create', User::class);
        return view('dashboard.add.worker');
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = new User;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->salary = $request->input('salary');
        $user->save();
        return redirect()->route('dashboard.workers');
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $input = $request->all();
        $user->update($input);
        return redirect()->route('dashboard.workers');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->back();
    }

    public function passwd($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.password', ['id' => $id]);
    }

    public function passwdChange(ChangePasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (!Hash::check($request->input('oldPasswd'), $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Old password is wrong']);
        } else if ($request->input('newPasswd') != $request->input('confirmPasswd')) {
            return redirect()->back()->withErrors(['error' => 'New password does not match']);
        } else {
            $user->password = Hash::make($request->input('newPasswd'));
            $user->save();
            return back()->with("status", "Password changed successfully!");
        }
    }

    public function passwdReset($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $user->password = Hash::make('1234');
        $user->save();
        return back()->with("status", "Password reseted successfully!");
    }
}
