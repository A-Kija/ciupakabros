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
            $name = $cat->savePhoto($photo);
        }
        $id = Cat::create([
            'title' => $request->title,
            'colors_count' => $request->colors_count,
            'photo' => $name ?? null
        ])->id;

        foreach ($request->gallery ?? [] as $gallery) {
            Photo::add($gallery, $id);
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
        
        if ($request->delete == 1) {
            $cat->deletePhoto();
            return redirect()->back();
        }

        $photo = $request->photo;

        if ($photo) {
            $name = $cat->savePhoto($photo);
            $cat->deletePhoto();
            $cat->update([
                'title' => $request->title,
                'colors_count' => $request->colors_count,
                'photo' => $name
            ]);
        } else {
            $cat->update([
                'title' => $request->title,
                'colors_count' => $request->colors_count,
            ]);
        }

        foreach ($request->gallery ?? [] as $gallery) {
            Photo::add($gallery, $cat->id);
        }

        return redirect()->route('cats-index');
    }


    public function destroy(Cat $cat)
    {
        
        if ($cat->gallery->count()) {
            foreach ($cat->gallery as $gal) {
                $gal->deletePhoto();
            }
        }
        
        if ($cat->photo) {
            $cat->deletePhoto();
        }
        
        $cat->delete();
        return redirect()->route('cats-index');
    }


    public function destroyPhoto(Photo $photo)
    {
        $photo->deletePhoto();
        return redirect()->back();
    }

}
