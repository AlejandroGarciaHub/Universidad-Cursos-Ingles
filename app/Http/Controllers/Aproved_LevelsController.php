<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aproved_Level;
use App\Level;
use App\Student;


use App\Http\Requests\Aproved_LevelRequest;

use Illuminate\Support\Facades\DB;

class Aproved_LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $aproved_levels=Aproved_Level::search($request->nombres)->orderBy('id','DESC')->paginate(5);;
//        $aproved_levels=Aproved_Level::orderBy('id','DESC')->paginate(5);
//        dd($aproved_levels);
        return view('admin.aproved_levels.index')->with('aproved_levels',$aproved_levels);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_student)
    {
        //

        return view('admin.aproved_levels.create')->with('alumno_grupo',$group_student);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Aproved_LevelRequest $request)
    {
        //
        $aproved_level= new Aproved_Level($request->all());
        $aproved_level->save();

        flash('Se ha registrado la calificación')->success();

        return redirect()->route('admin.group_students.calificaciones',$request->alumno_grupo_id);

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
        //
        $levels=Level::orderBy('descripcion_nivel','ASC')->pluck('descripcion_nivel','id');
        $students = Student::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');

        $aproved_level=Aproved_Level::find($id);

        return view('admin.aproved_levels.edit')->with('levels',$levels)->with('students',$students)->with('aproved_level',$aproved_level);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Aproved_LevelRequest $request, $id)
    {
        //
        $aproved_level=Aproved_Level::find($id);

        $aproved_level->fill($request->all());

        $aproved_level->save();

        flash('El registro ha sido editado satisfactoriamente')->success();

        return redirect()->route('aproved_levels.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $aproved_level=Aproved_Level::find($id);
        $aproved_level->delete();

        flash('El registro de calificación ha sido correctamente eliminado')->error();

        return redirect()->route('aproved_levels.index');

    }
}
