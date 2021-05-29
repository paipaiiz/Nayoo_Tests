<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlbumResource::collection(Album::all());
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
        $alList = new Album;
        $alList->name_album = $request->name_album;
        $alList->al_categories_id = $request->al_categories_id;
        $alList->save();
        return response(
            [
                'data' => new AlbumResource($alList)
            ],
            201
        );
    }
    public function addTag(Request $request)
    {
        $tagList = new Album;
        $tagList->album_id = $request->album_id;
        $tagList->tag_id = $request->tag_id;
        $tagList->save();
        return response(
            [
                'data' => new AlbumResource($tagList)
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->update($request->all());
        return response(
            [
                'data' => new AlbumResource($album)
            ],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return AlbumResource::collection(Album::all());
    }
}
