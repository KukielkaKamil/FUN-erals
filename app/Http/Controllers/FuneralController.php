<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFuneralRequest;
use App\Http\Requests\UpdateNewRequest;
use App\Models\Funeral;
use App\Models\Offer;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class FuneralController extends Controller
{
    public function index()
 {
    $this->authorize('viewAny', Funeral::class);
    $user = Auth::user();
    if($user->id == 1){
    $funerals = Funeral::whereNotIn('accepted',array('0'))->get();
    return view('dashboard.index', ['funerals' => $funerals]);
    }
    else{
        $user_id = $user->id;
        $funerals = Funeral::whereHas('user', function ($query) use ($user_id) {
            $query->where('id', $user_id);
        })->orderBy('date', 'asc')->get();
        return view('worker.index', ['funerals' => $funerals]);
    }
 }

 public function new()
 {
    $this->authorize('viewAny', Funeral::class);
    $funerals = Funeral::whereIn('accepted',array('0'))->get();;
    return view('dashboard.new', ['funerals' => $funerals]);
 }
 public function history(){
    $this->authorize('viewAny', Funeral::class);
    $user = Auth::user();
    $user_id = $user->id;
        $funerals = Funeral::whereHas('user', function ($query) use ($user_id) {
            $query->where('id', $user_id);
        })->whereNotIn('accepted',array('0'))->get();
        return view('worker.history', ['funerals' => $funerals]);

 }

 public function edit($id)
 {
    $funeral = Funeral::findOrFail($id);
    $this->authorize('update', $funeral);
    $offers = Offer::all();
    $workers = User::all()->except(1);

    return view('dashboard.edit.funeral', ['funeral' => $funeral,'offers' => $offers,'workers' => $workers]);
 }
 public function editNew($id)
 {
    $funeral = Funeral::findOrFail($id);
    $this->authorize('update', $funeral);
    $workers = User::all()->except(1);
    return view('dashboard.edit.new', ['funeral' => $funeral,'workers' => $workers]);
 }

 public function update(UpdateFuneralRequest $request, $id){
    $funeral = Funeral::findOrFail($id);
    $this->authorize('update', $funeral);
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

 public function updateNew(UpdateNewRequest $request, $id){
    $funeral = Funeral::findOrFail($id);
    $this->authorize('update', $funeral);
    $selectedWorkers = $request->input('workers',[]);
    $workers = User::whereIn('id',$selectedWorkers)->get();

    $date = $funeral->date;


    foreach($workers as $w){
        if($w->isOccupied($funeral,$date)){
            return redirect()->back()->withErrors(['error' => 'Some of the selected workers are occupied at that time']);
        }
    }

    $funeral->date = $date;
    $funeral->user()->sync($selectedWorkers);
    $funeral->accepted = true;
    $funeral->save();
    return redirect()->route('dashboard.index');

 }

 public function destroy($id){
    $funeral = Funeral::findOrFail($id);
    $this->authorize('delete', $funeral);
    $this->authorize('update', $funeral);
    $this->authorize('delete', $funeral);
    $funeral->delete();
    return redirect()->back();
 }
}
