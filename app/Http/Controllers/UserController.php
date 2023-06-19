<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
 {
    $workers = User::all();
    return view('dashboard.workers', ['workers' => $workers]);
 }

}
