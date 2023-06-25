<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewFuneralRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Funeral;
use App\Models\Offer;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Client::class);
        $clients = Client::all();
        return view('dashboard.clients', ['clients' => $clients]);
    }

    public function show($id)
    {
        $this->authorize('viewAny', Client::class);
        $client = Client::findOrFail($id);
        return view('dashboard.show.client', ['client' => $client]);
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->authorize('update', $client);
        return view('dashboard.edit.client', ['client' => $client]);
    }
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $this->authorize('update', $client);
        $input = $request->all();
        $client->update($input);
        return redirect()->route('dashboard.clients');
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $this->authorize('update', $client);
        $client->delete();
        return redirect()->back();
    }

    public function addNewFuneral(AddNewFuneralRequest $request)
    {
        $clientId = 0;
        if (Client::where('pesel', $request->input('pesel'))->exists()) {
            $client = Client::where('pesel', $request->input('pesel'))->first();
            $clientId = $client->id;
        } else {
            $client = new Client;
            $client->name = $request->input('name');
            $client->surname = $request->input('surname');
            $client->pesel = $request->input('pesel');
            $client->email = $request->input('email');
            $client->phone_number = $request->input('phone_number');
            $client->save();
            $clientId = $client->id;
        }
        $promocode = $client = PromoCode::where('code', $request->input('promo_code'))->first();
        if($promocode != null && ($promocode->client == null || $promocode->client->id == $clientId)){
            $discount=1.0 - $promocode->discount;
        }
        else{
            $discount = 0.0;
        }
        $funeral = new Funeral;
        $date = $request->input('date');
        $time = $request->input('time');

        $timestamp = $date . ' ' . $time;
        $funeral->date = $timestamp;
        $funeral->cost = Offer::find($request->input('offer_id'))->price * $discount;
        $funeral->accepted = false;
        $funeral->offer_id = $request->input('offer_id');
        $funeral->client_id = $clientId;
        $funeral->save();
        return redirect()->route('home');
    }
}
