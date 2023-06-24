<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index()
    {
        $clients = PromoCode::all();
        return view('dashboard.promocodes', ['clients' => $clients]);
    }
    public function add()
    {
        return view('dashboard.add.promocode');
    }
    public function store()
    {
        return redirect()->route('dashboard.promocodes');
    }
}
