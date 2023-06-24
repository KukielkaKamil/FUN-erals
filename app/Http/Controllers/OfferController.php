<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
 {
    $offfers = Offer::all();
    return view('dashboard.offers', ['offers' => $offfers]);
 }
 public function edit($id)
 {
    return view('dashboard.edit.offer', ['offer' => Offer::findOrFail($id)]);
 }
 public function add()
 {
    return view('dashboard.add.offer');
 }

 public function store(StoreOfferRequest $request){
    $input = $request->all();
    Offer::create($input);
    return redirect()->route('dashboard.offers');
 }

 public function update(UpdateOfferRequest $request,$id){
    $input = $request->all();
    Offer::find($id)->update($input);
    return redirect()->route('dashboard.offers');
 }
 public function destroy($id){
    Offer::findOrFail($id)->delete();
    return redirect()->back();
 }
}
