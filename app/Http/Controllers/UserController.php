<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
 {
    $workers = User::all();
    return view('dashboard.workers', ['workers' => $workers]);
 }

 public function edit($id)
 {
    return view('dashboard.edit.worker', ['worker' => User::findOrFail($id)]);
 }
 public function add()
 {
    return view('dashboard.add.worker');
 }

 public function store(StoreUserRequest $request){
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
 public function update(UpdateUserRequest $request,$id){
    $input = $request->all();
    User::find($id)->update($input);
    return redirect()->route('dashboard.workers');
 }
 public function destroy($id){
    User::findOrFail($id)->delete();
    return redirect()->back();
 }
}
