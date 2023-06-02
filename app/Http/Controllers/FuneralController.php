<?php

namespace App\Http\Controllers;

use App\Models\Funeral;
use Illuminate\Http\Request;

class FuneralController extends Controller
{
    public function index()
 {
    $funerals = Funeral::whereIn('status',array('done','in progress','ready to go'))->get();
    return view('dashboard.index', ['funerals' => $funerals]);
 }

 public function new()
 {
    $funerals = Funeral::all();
    return view('dashboard.new', ['funerals' => $funerals]);
 }

 public function show($id)
 {
    return view('dashboard.show', ['funeral' => Funeral::findOrFail($id)]);
 }
}
