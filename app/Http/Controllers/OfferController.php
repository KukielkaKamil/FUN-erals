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
    $this->authorize('viewAny', Offer::class);
    $offfers = Offer::all();
    return view('dashboard.offers', ['offers' => $offfers]);
 }
 public function edit($id)
 {
    $offer = Offer::findOrFail($id);
    $this->authorize('update', $offer);
    return view('dashboard.edit.offer', ['offer' => $offer]);
 }
 public function add()
 {
    $this->authorize('create', Offer::class);
    return view('dashboard.add.offer');
 }

 public function store(StoreOfferRequest $request){
    $this->authorize('create', Offer::class);
    $input = $request->all();
    Offer::create($input);
    return redirect()->route('dashboard.offers');
 }

 public function update(UpdateOfferRequest $request,$id){
    $offer = Offer::findOrFail($id);
    $this->authorize('update', $offer);
    $input = $request->all();
    $offer->update($input);
    return redirect()->route('dashboard.offers');
 }
 public function destroy($id){
    $offer = Offer::findOrFail($id);
    $this->authorize('delete', $offer);
    $offer->delete();
    return redirect()->back();
 }
}
