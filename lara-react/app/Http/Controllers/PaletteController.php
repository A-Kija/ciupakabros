<?php

namespace App\Http\Controllers;

use App\Models\Palette;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaletteController extends Controller
{

    public function index()
    {
        return Inertia::render('Palette', 
        [
            'storeUrl' => route('palette-store')
            
        ]);
    }


    public function store(Request $request)
    {
        Palette::create( [
            'title' => $request->title
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Palette  $palette
     * @return \Illuminate\Http\Response
     */
    public function show(Palette $palette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Palette  $palette
     * @return \Illuminate\Http\Response
     */
    public function edit(Palette $palette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaletteRequest  $request
     * @param  \App\Models\Palette  $palette
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaletteRequest $request, Palette $palette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Palette  $palette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Palette $palette)
    {
        //
    }
}
