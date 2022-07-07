<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $pizzas = Pizza::all();

        return view('admin.pizzas.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nome"=>"required|min:3|max:255",
            "ingredienti"=>"required|min:3|max:255",
        ],
        [
            "nome.required"=>"E' necessario inserire il nome!",
            "nome.min"=>"Il nome deve essere lungo almeno :min caratteri",
            "nome.max"=>"Il nome non deve essere più lungo di :max caratteri",
            "ingredienti.required"=>"E' necessario inserire gli ingredienti",
            "ingredienti.min"=>"Gli ingredienti devono essere lunghi almeno :min caratteri",
            "ingredienti.max"=>"Gli ingredienti devono essere lunghi meno di :max caratteri",


        ]);


        $data = $request->all();
        $new_pizza = new Pizza();
        $data['slug'] = Pizza::genSlug($data['nome']);
        $new_pizza->fill($data);
        $new_pizza->save();
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
        return view('admin.pizzas.show', compact('pizza'));
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
        return view('admin.pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        $data = $request->all();
        $data['slug']=Pizza::genSlug($data['nome']);
        $pizza->update($data);
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
        return redirect()->route('admin.pizzas.index');
    }
}
