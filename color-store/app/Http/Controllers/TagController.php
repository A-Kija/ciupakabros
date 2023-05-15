<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('back.tags.index');
    }

    public function list()
    {
        // sleep(3);
        $tags = Tag::all();
        $html = view('back.tags.list')->with(['tags' => $tags])->render();
        return response()->json([
            'html' => $html,
            'status' => 'ok',
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function create(Request $request)
    {
        $title = $request->title ?? '';
        $tag = Tag::where('title', $title)->first();

        if (!$tag && $title) {
            $tag = Tag::create([
                'title' => $title
            ]);
            return response()->json([
                'status' => 'ok',
                'message' => 'New tag #'.$title.' was created'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Tag already exists or empty.'
        ]);
    }


    public function showModal(Tag $tag)
    {
        $html = view('back.tags.modal')->with(['tag' => $tag])->render();
        return response()->json([
            'html' => $html,
            'status' => 'ok',
        ]);
    }


    public function update(Request $request, Tag $tag)
    {
        $title = $request->title ?? '';
        $OldTag = Tag::where('title', $title)->first();

        if ($OldTag && $OldTag->id == $tag->id) {
            return response()->json([
                'status' => 'info',
                'message' => 'Tag was not updated'
            ]);
        }

        if (!$OldTag && $title) {
            $tag->update([
                'title' => $title
            ]);
            return response()->json([
                'status' => 'ok',
                'message' => 'Now tag is #'.$title
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Tag already exists or empty.'
        ]);
    }

}
