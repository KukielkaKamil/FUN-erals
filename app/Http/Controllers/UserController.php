<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
