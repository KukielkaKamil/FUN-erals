<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewFuneralRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('dashboard.clients',['clients' => $clients]);
    }

    public function show($id){
        $client = Client::findOrFail($id);
        return view('dashboard.show.client',['client' => $client]);
    }
    public function edit($id){
        $client = Client::findOrFail($id);
        return view('dashboard.edit.client',['client' => $client]);
    }
    public function update(UpdateClientRequest $request,$id){
        $input = $request->all();
        Client::find($id)->update($input);
        return redirect()->route('dashboard.clients');
     }
     public function destroy($id){
        Client::findOrFail($id)->delete();
        return redirect()->back();
     }

     public function addNewFuneral(AddNewFuneralRequest $request){
        $input = $request->all();
        $client = new Client;
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->pesel = $request->input('pesel');
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->save();
        return redirect()->route('home');
     }
}
