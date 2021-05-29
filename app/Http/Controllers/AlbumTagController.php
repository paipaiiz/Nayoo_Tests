<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumTagResource;
use App\Models\Album_tag;
use Illuminate\Http\Request;

class AlbumTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlbumTagResource::collection(Album_tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tagList = new Album_tag();
        $tagList->album_id = $request->album_id;
        $tagList->tag_id = $request->tag_id;
        $tagList->save();
        return response(
            [
                'data' => new AlbumTagResource($tagList)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album_tag  $album_tag
     * @return \Illuminate\Http\Response
     */
    public function show(Album_tag $album_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album_tag  $album_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Album_tag $album_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album_tag  $album_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album_tag $album_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album_tag  $album_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album_tag $album_tag)
    {
        //
    }
}
