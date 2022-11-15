<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{    
    /*
        GET|HEAD        almacen .................... almacen.index › AlmacenController@index
        POST            almacen .................... almacen.store › AlmacenController@store
        GET|HEAD        almacen/create ........... almacen.create › AlmacenController@create
        GET|HEAD        almacen/{almacen} .............. almacen.show › AlmacenController@show
        PUT|PATCH       almacen/{almacen} .......... almacen.update › AlmacenController@update
        DELETE          almacen/{almacen} ........ almacen.destroy › AlmacenController@destroy
        GET|HEAD        almacen/{almacen}/edit ......... almacen.edit › AlmacenController@edit
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacens = Almacen::all();  
        return view('almacen/almacenIndex', compact('almacens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen/almacenCreate');
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
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        Almacen::create($request->all());
        //Redirigir
        return redirect('/almacen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        return view('/almacen/almacenShow', compact('almacen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        return view('almacen/almacenEdit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        $request->validate([
            'nombre' => 'required|max:30',
        ]);

        Almacen::where('id',$almacen->id)->update($request->except('_token', '_method'));

        return redirect('/almacen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        $almacen -> delete();
        return redirect('/almacen');
    }
}