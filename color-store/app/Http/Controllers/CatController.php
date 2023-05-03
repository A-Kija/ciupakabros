<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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
            'photo' => 'sometimes|required|image|max:512',
            'gallery.*' => 'sometimes|required|image|max:512'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }


        
        $photo = $request->photo;
        if ($photo) {
            // Image::configure(['driver' => 'imagick']);




            $name = $photo->getClientOriginalName();
            $name = rand(1000000, 9999999) . '-' . $name;
            $path = public_path() . '/cats-photo/';
            $photo->move($path, $name);

            $img = Image::make($path . $name);
            $img->resize(200, 200);
            $img->save($path . 't_' . $name, 90);




        }
        $id = Cat::create([
            'title' => $request->title,
            'colors_count' => $request->colors_count,
            'photo' => $name ?? null
        ])->id;

        foreach ($request->gallery ?? [] as $gallery) {
            $name = $gallery->getClientOriginalName();
            $name = rand(1000000, 9999999) . '-' . $name;
            $path = public_path() . '/cats-photo/';
            $gallery->move($path, $name);
            Photo::create([
                'cat_id' => $id,
                'photo' => $name
            ]);
        }


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
        
        if ($cat->gallery->count()) {
            foreach ($cat->gallery as $gal) {
                $photo = public_path() . '/cats-photo/' . $gal->photo;
                unlink($photo);
                $gal->delete();
            }
        }
        
        if ($cat->photo) {
            $photo = public_path() . '/cats-photo/' . $cat->photo;
            unlink($photo);
        }
        
        $cat->delete();
        return redirect()->route('cats-index');
    }
}
