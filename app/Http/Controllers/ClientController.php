<?php

namespace App\Http\Controllers;

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
}
