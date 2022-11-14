<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;

class objetoController extends Controller
{    
    /*
        GET|HEAD        objeto .................... objeto.index › objetoController@index
        POST            objeto .................... objeto.store › objetoController@store
        GET|HEAD        objeto/create ........... objeto.create › objetoController@create
        GET|HEAD        objeto/{objeto} .............. objeto.show › objetoController@show
        PUT|PATCH       objeto/{objeto} .......... objeto.update › objetoController@update
        DELETE          objeto/{objeto} ........ objeto.destroy › objetoController@destroy
        GET|HEAD        objeto/{objeto}/edit ......... objeto.edit › objetoController@edit
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetos = Objeto::all();  
        return view('objeto/objetoIndex', compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objeto/objetoCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar
        $request->validate([
            'nombre' => 'required|max:70',
            'tipo' => 'required|max:30',
            'cantidad' => 'required|max:30',
            'fechacreacion' => 'max:20',
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        Objeto::create($request->all());
        //Redirigir
        return redirect('/objeto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function show(Objeto $objeto)
    {
        return view('/objeto/objetoShow', compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Objeto $objeto)
    {
        return view('objeto/objetoEdit', compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objeto $objeto)
    {
        $request->validate([
            'nombre' => 'required|max:70',
            'tipo' => 'required|max:30',
            'cantidad' => 'required|max:30',
            'fechacreacion',
        ]);

        Objeto::where('id',$objeto->id)->update($request->except('_token', '_method'));

        return redirect('/objeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objeto  $objeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objeto $objeto)
    {
        $objeto -> delete();
        return redirect('/objeto');
    }
}