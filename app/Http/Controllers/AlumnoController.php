<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{    
    /*
        GET|HEAD        alumno .................... alumno.index › AlumnoController@index
        POST            alumno .................... alumno.store › AlumnoController@store
        GET|HEAD        alumno/create ........... alumno.create › AlumnoController@create
        GET|HEAD        alumno/{alumno} .............. alumno.show › AlumnoController@show
        PUT|PATCH       alumno/{alumno} .......... alumno.update › AlumnoController@update
        DELETE          alumno/{alumno} ........ alumno.destroy › AlumnoController@destroy
        GET|HEAD        alumno/{alumno}/edit ......... alumno.edit › AlumnoController@edit
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();  
        return view('alumno/alumnoIndex', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumno/alumnoCreate');
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
            'horasServicio' => 'required|digits_between:1,4',
            'laboratorio' => 'required|max:50',
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        Alumno::create($request->all());
        //Redirigir
        return redirect('/alumno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('/alumno/alumnoShow', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumno/alumnoEdit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|max:70',
            'horasServicio' => 'required|digits_between:1,4',
            'laboratorio' => 'required|max:50',
        ]);

        Alumno::where('id',$alumno->id)->update($request->except('_token', '_method'));

        return redirect('/alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno -> delete();
        return redirect('/alumno');
    }
}