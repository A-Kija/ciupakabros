<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all()->sortBy('name');

        return view('clients.index', [
            'clients' => $clients
        ]);

    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->tt = isset($request->tt) ? 1 : 0;
        $client->save();
        return redirect()->route('clients-index');

    }


    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }


    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }


    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->tt = isset($request->tt) ? 1 : 0;
        $client->save();
        return redirect()->route('clients-index');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients-index');
    }
}