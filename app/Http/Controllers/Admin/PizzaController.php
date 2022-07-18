<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PizzaRequest;
use App\Ingredient;
use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizze = Pizza::orderBy('id', 'desc')->get();
        return view('admin.pizzas.index', compact('pizze'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('admin.pizzas.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $data = $request->all();
        $new_pizza = new Pizza();
        $new_pizza->slug = Pizza::slugGenerator($data['name']);
        $new_pizza->fill($data);
        $new_pizza->save();
       if (array_key_exists('ingredients',$data)) {
            $new_pizza->ingredients()->attach($data['ingredients']);
       }

        return redirect()->route('admin.pizzas.show', $new_pizza);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::find($id);

        if($pizza){
            return view('admin.pizzas.show', compact('pizza'));
        }
        abort(404, 'La pizza cercata non è stata trovata nell\'elenco');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        $ingredients = Ingredient::all();
        if($pizza){
            return view('admin.pizzas.edit', compact('pizza', 'ingredients'));
        }
        abort(404, 'La pizza cercata non è stata trovata nell\'elenco');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, Pizza $pizza)
    {
        $updated_pizza= $request->all();
        if($pizza->name != $updated_pizza['name']){
            $updated_pizza['slug'] = Pizza::slugGenerator($updated_pizza['name']);
        }

        $pizza->update($updated_pizza);

        if(array_key_exists('ingredients', $updated_pizza)){
            $pizza->ingredients()->sync($updated_pizza['ingredients']);
        }
        // non serve per controlli in request required
        // } else {
        //     $pizza->ingredients()->detach();
        // }
        return redirect()->route('admin.pizzas.show', $pizza);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('admin.pizzas.index')->with('deleted', "La pizza $pizza->name è stata cancellata correttamente");
    }
}
