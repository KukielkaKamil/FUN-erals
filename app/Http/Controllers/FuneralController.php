<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFuneralRequest;
use App\Models\Funeral;
use App\Models\Offer;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class FuneralController extends Controller
{
    public function index()
 {
    $funerals = Funeral::whereNotIn('accepted',array('0'))->get();
    return view('dashboard.index', ['funerals' => $funerals]);
 }

 public function new()
 {
    $funerals = Funeral::whereIn('accepted',array('0'))->get();;
    return view('dashboard.new', ['funerals' => $funerals]);
 }

 public function edit($id)
 {
    $offers = Offer::all();
    $workers = User::all()->except(1);

    return view('dashboard.edit.funeral', ['funeral' => Funeral::findOrFail($id),'offers' => $offers,'workers' => $workers]);
 }
 public function editNew($id)
 {
    $offers = Offer::all();
    $workers = User::all();
    return view('dashboard.edit.new', ['funeral' => Funeral::findOrFail($id),'offers' => $offers,'workers' => $workers]);
 }

 public function update(UpdateFuneralRequest $request, $id){
    $funeral = Funeral::findOrFail($id);
    $selectedWorkers = $request->input('workers',[]);
    $workers = User::whereIn('id',$selectedWorkers)->get();

    $date = $request->input('date');
    $time = $request->input('time');

    $timestamp = $date . ' ' . $time;

    foreach($workers as $w){
        if($w->isOccupied($funeral,$timestamp)){
            return redirect()->back()->withErrors(['error' => 'Some of the selected workers are occupied at that time']);
        }
    }

    $funeral ->date = $timestamp;
    $funeral -> cost = $request->input('cost');
    $funeral->offer_id = $request->input('offer_id');
    $funeral->user()->sync($selectedWorkers);
    $funeral -> save();
    return redirect()->route('dashboard.index');
 }
}
