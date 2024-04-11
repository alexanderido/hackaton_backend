<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreTagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagsCollection;

class TagController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TagsCollection(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagsRequest $request)
    {

        $tag = Tag::create([
            'name' => $request->name,
            'icon' => $request->file('icon')->store('icons', 'public')
        ]);

        return response()->json($tag, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {

        return response()->json($tag);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(null, 204);
    }
}
