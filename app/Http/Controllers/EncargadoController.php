<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use Illuminate\Http\Request;

class encargadoController extends Controller
{    
    /*
        GET|HEAD        encargado .................... encargado.index › EncargadoController@index
        POST            encargado .................... encargado.store › EncargadoController@store
        GET|HEAD        encargado/create ........... encargado.create › EncargadoController@create
        GET|HEAD        encargado/{encargado} .............. encargado.show › EncargadoController@show
        PUT|PATCH       encargado/{encargado} .......... encargado.update › EncargadoController@update
        DELETE          encargado/{encargado} ........ encargado.destroy › EncargadoController@destroy
        GET|HEAD        encargado/{encargado}/edit ......... encargado.edit › EncargadoController@edit
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encargados = Encargado::all();  
        return view('encargado/encargadoIndex', compact('encargados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encargado/encargadoCreate');
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
        Encargado::create($request->all());
        //Redirigir
        return redirect('/encargado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(Encargado $encargado)
    {
        return view('/encargado/encargadoShow', compact('encargado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit(Encargado $encargado)
    {
        return view('encargado/encargadoEdit', compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        $request->validate([
            'nombre' => 'required|max:70',
        ]);

        Encargado::where('id',$encargado->id)->update($request->except('_token', '_method'));

        return redirect('/encargado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encargado $encargado)
    {
        $encargado -> delete();
        return redirect('/encargado');
    }
}