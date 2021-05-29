<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlCategoryResource;
use App\Models\AlCategory;
use Illuminate\Http\Request;

class AlCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AlCategory::get();
        return response($data);
        // return AlCategoryResource::collection(AlCategory::all());
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
        $data = $request->validate([
            'name_categorie'=>'sometimes'
        ]);
        AlCategory::create($data);
        return 'success';
        // $catList = new AlCategory;
        // $catList->name_categorie = $request->name_categorie;
        // $catList->save();
        // return response(
        //     [
        //         // 'data' => new AlCategoryResource($catList)
        //     ],
        //     201
        // );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlCategory  $alCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AlCategory $alcategory)
    {
        return new AlCategoryResource($alcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlCategory  $alCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AlCategory $alcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlCategory  $alCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlCategory $alcategory)
    {
        $alcategory->update($request->all());
        return response(
            [
                'data' => new AlCategoryResource($alcategory)
            ],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlCategory  $alCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlCategory $alcategory)
    {
        $alcategory->delete();
        return AlCategoryResource::collection(AlCategory::all());
    }
}
