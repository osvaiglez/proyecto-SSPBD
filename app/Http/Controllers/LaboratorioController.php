<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{    
    /*
        GET|HEAD        laboratorio .................... laboratorio.index › LaboratorioController@index
        POST            laboratorio .................... laboratorio.store › LaboratorioController@store
        GET|HEAD        laboratorio/create ........... laboratorio.create › LaboratorioController@create
        GET|HEAD        laboratorio/{laboratorio} .............. laboratorio.show › LaboratorioController@show
        PUT|PATCH       laboratorio/{laboratorio} .......... laboratorio.update › LaboratorioController@update
        DELETE          laboratorio/{laboratorio} ........ laboratorio.destroy › LaboratorioController@destroy
        GET|HEAD        laboratorio/{laboratorio}/edit ......... laboratorio.edit › LaboratorioController@edit
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorios = Laboratorio::all();  
        return view('laboratorio/laboratorioIndex', compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratorio/laboratorioCreate');
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
            'nombre_encargado' => 'required|max:70',
            'nombre_almacen' => 'required|max:20',
            
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        Laboratorio::create($request->all());
        //Redirigir
        return redirect('/laboratorio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio)
    {
        return view('/laboratorio/laboratorioShow', compact('laboratorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorio $laboratorio)
    {
        return view('laboratorio/laboratorioEdit', compact('laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorio $laboratorio)
    {
        $request->validate([
            'nombre' => 'required|max:70',
            'nombre_encargado' => 'required|max:70',
            'nombre_almacen' => 'required|max:20',
        ]);

        Laboratorio::where('id',$laboratorio->id)->update($request->except('_token', '_method'));

        return redirect('/laboratorio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio -> delete();
        return redirect('/laboratorio');
    }
}