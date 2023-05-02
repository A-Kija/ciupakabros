<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{

    public function index()
    {
        $cats = Cat::all();

        return view('back.cats.index', [
            'cats' => $cats
        ]);
    }


    public function create()
    {
        return view('back.cats.create', [

        ]);
    }


    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'colors_count' => 'required|integer|min:1|max:6',
            'photo' => 'sometimes|required|image'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }


        
        $photo = $request->photo;

        if ($photo) {

            $name = $photo->getClientOriginalName();

            $name = rand(1000000, 9999999) . '-' . $name;

            $path = public_path() . '/cats-photo/';

            $photo->move($path, $name);
        }
       
        
        Cat::create([
            'title' => $request->title,
            'colors_count' => $request->colors_count,
            'photo' => $name ?? null
        ]);
        return redirect()->route('cats-index');
    }


    public function edit(Cat $cat)
    {
        return view('back.cats.edit', [
            'cat' => $cat
        ]);
    }


    public function update(Request $request, Cat $cat)
    {
        $cat->update([
            'title' => $request->title,
            'colors_count' => $request->colors_count,
        ]);
        return redirect()->route('cats-index');
    }


    public function destroy(Cat $cat)
    {
        
        if ($cat->photo) {
            $photo = public_path() . '/cats-photo/' . $cat->photo;
            unlink($photo);
        }
        
        $cat->delete();
        return redirect()->route('cats-index');
    }
}
