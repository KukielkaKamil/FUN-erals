<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
 {
    $offfers = Offer::all();
    return view('dashboard.offers', ['offers' => $offfers]);
 }
}
