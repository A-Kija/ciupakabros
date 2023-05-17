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
            'storeUrl' => route('palette-store'),
            'listUrl' => route('palette-list'),
        ]);
    }


    public function store(Request $request)
    {
        Palette::create( [
            'title' => $request->title
        ]);
        return response()->json([
            'status' => 'ok',
            'msg' => 'Created'
        ], 201);
    }

    public function list()
    {
        $palettes = Palette::all()
        ->map(function($p) {
            $p->deleteUrl = route('palette-delete', $p);
            $p->updateUrl = route('palette-update', $p);
            return $p;
        });
        return response()->json($palettes);
    }


    public function update(Request $request, Palette $palette)
    {
        $palette->update([
            'title' => $request->title
        ]);
        return response()->json([
            'status' => 'ok',
            'msg' => 'Updated'
        ]);
    }


    public function destroy(Palette $palette)
    {
        $palette->delete();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Deleted'
        ]);
    }
}
