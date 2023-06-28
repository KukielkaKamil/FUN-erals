<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewFuneralRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Mail\SendPromoCode;
use App\Models\Client;
use App\Models\Funeral;
use App\Models\Offer;
use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $this->authorize('delete', $client);
        $client->delete();
        return redirect()->back();
    }

    public function successOrder()
    {
        return view('success');
    }

    public function addNewFuneral(AddNewFuneralRequest $request)
    {
        //checking if code isn't expired
        $promocode = PromoCode::where('code', $request->input('promo_code'))->first();
        if ($promocode != null && Carbon::parse($promocode->exp_date)->lessThan(Carbon::now())) {
            return redirect()->back()->withErrors(['error' => 'Code has already expired']);
        }
        // Adding new client or checking if exists
        $clientId = 0;
        if (Client::where('pesel', $request->input('pesel'))->exists()) {
            $client = Client::where('pesel', $request->input('pesel'))->first();
            if (strcmp($client->name, $request->input('name')) != 0 || strcmp($client->surname, $request->input('surname')) != 0) {
                return redirect()->back()->withErrors(['error' => 'Given data does not match our records. Check if your data is correct.']);
            }
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
        //checking interted promocode
        if ($promocode != null && ($promocode->client == null || $promocode->client->id == $clientId)) {
            $discount = 1.0 - $promocode->discount;
        } else {
            $discount = 1.0;
        }
        //adding new funeral
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
        //creating new promocode
        $promo = new PromoCode;
        $promo->code = Str::random(30);
        $promo->discount = rand(1, 15) / 100.0;
        $promo->exp_date = Carbon::now()->addDays(60);
        $promo->client_id = $clientId;
        $promo->save();

        //creating new email
        $mailData = [
            'name' => $request->input('name'),
            'exp_date' => $promo->exp_date->toDateString(),
            'promocode' => $promo,
            'funeral' => $funeral,
            'client' => $client,
            'discount' => $discount
        ];

        Mail::to($request->input('email'))->send(new SendPromoCode($mailData));
        return redirect()->route('success');
    }
}
