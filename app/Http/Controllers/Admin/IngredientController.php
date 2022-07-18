<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('id', 'desc')->get();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $new_ingredient = new Ingredient();
        $new_ingredient->slug = Str::slug($data['name']);
        $new_ingredient->fill($data);
        $new_ingredient->save();


        return redirect()->route('admin.ingredients.index', $new_ingredient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);

        if($ingredient){
            return view('admin.ingredients.edit', compact('ingredient'));
        }
        abort(404, 'L\'ingrediente cercata non è stata trovata nell\'elenco');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $updated_ingredient = $request->all();
        if($updated_ingredient['name'] != $ingredient->name){
            $ingredient->slug = Str::slug($updated_ingredient['name']);
        }
        $ingredient->update($updated_ingredient);

        return redirect()->route('admin.ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()-> route('admin.ingredients.index')->with('deleted', "$ingredient->name eliminato con successo");
    }
}
