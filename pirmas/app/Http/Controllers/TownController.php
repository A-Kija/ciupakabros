<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;


class TownController extends Controller
{

    public function index()
    {
        $towns = Town::all();

        // nereiku, nes cia yra FRANKENSTEINAS
        $towns->each(function($t) {
            $ordersCount = 0;
            $t->client->each(function($c) use(&$ordersCount) {
                $ordersCount += $c->order->count();
            });
            $t->ordersCount = $ordersCount;
        });
        
        return view('towns.index', [
            'towns' => $towns,
        ]);
    }


    public function create()
    {
        return view('towns.create');
    }


    public function store(Request $request)
    {
        Town::create([
            'name' => $request->name,
        ]);

        return redirect()->route('towns-index');
    }


    public function show(Town $town)
    {
        //
    }


    public function edit(Town $town)
    {
        return view('towns.edit', [
            'town' => $town
        ]);
    }


    public function update(Request $request, Town $town)
    {
        $town->update([
            'name' => $request->name,
        ]);

        return redirect()->route('towns-index')
        ->with('ok', 'The town was updated');
    }


    public function destroy(Town $town)
    {
        if ($town->client->count()) {
            return redirect()->back()
            ->with('info', 'Town has living clients');
        }
        $town->delete();
        return redirect()->back()
        ->with('ok', 'Town was deleted');
    }
}
