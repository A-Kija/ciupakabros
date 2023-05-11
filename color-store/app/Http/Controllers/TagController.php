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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */

}
