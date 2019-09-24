<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Http\Resources\CategoriesResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return CategoriesResource::collection($categories);
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
        $categories = $request->isMethod('put') ? Categories::findOrFail($request->input('id')) : new Categories;
        
        $categories->id = $request->isMethod('put') ? $request->input('id') : '';
        $categories->categories_name = $request->input('categories_name');

        if($categories->save()){
            return CategoriesResource::collection(Categories::all());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        return new CategoriesResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        if($category->delete()){
            return CategoriesResource::collection(Categories::all());
        }
    }

    /**
     * Trash the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        return CategoriesResource::collection(Categories::onlyTrashed()->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $category = Categories::withTrashed()->where('id', $id)->restore();
        return CategoriesResource::collection(Categories::all());
    }


}
