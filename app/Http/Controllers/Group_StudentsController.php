<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group_Student;

use App\Student;
use App\Group;
use App\Aproved_Level;

use App\Career;
use Illuminate\Support\Facades\DB;

class Group_StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function calificaciones($group){
      $group_students=Group_Student::where('grupo_id','=',$group)->get();


      $aproved_levels_array;
      foreach ($group_students as $group_student) {
        # code...
        $aproved_levels_array[]=Aproved_Level::where('alumno_grupo_id','=',$group_student->id)->get();
      }

      $careers=Career::orderBy('nombre','ASC')->pluck('nombre','id');

      return view('admin.group_students.calificaciones')->with('group_students',$group_students)->with('grupo',$group)->with('aproved_levels_array',$aproved_levels_array)->with('careers',$careers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group)
    {
        //
        $students = Student::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');

        return view('admin.group_students.create')->with('students',$students)->with('grupo',$group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $group_student= new Group_Student($request->all());
        $group_student->save();

        flash('Se ha registrado el alumno en el grupo')->success();

        return redirect()->route('groups.index');
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

    public function actualizar(Request $request, $id)
    {
        //
        $data=$request->all();
        
        $nombres=$request->nombres;
        $apellidos=$request->apellidos;
        $numero_control=$request->numero_control;
        $carrera_id=$request->carrera_id;

        $carrera=$request->carrera;

        $calificacion=$request->calificacion;

        if($request->ajax()) {
            $group_student = Group_Student::find($request->id);
            $student=Student::find($group_student->alumno_id);
            $student->nombres=$nombres;
            $student->apellidos=$apellidos;
            $student->numero_control=$numero_control;
            $student->carrera_id=$carrera_id;
            $student->save();

            $group=Group::find($group_student->grupo_id);

            $aproved_level=$group_student->niveles_aprobados->where('alumno_grupo_id', '=',$group_student->id)->first();
            if (is_null($aproved_level)) {
              # code...
              $aproved_level= new Aproved_Level();
              $aproved_level->calif=$calificacion;
              $aproved_level->alumno_grupo_id=$group_student->id;
            }
            else {
              # code...
              $aproved_level->calif=$calificacion;
            }
            $aproved_level->save();

            flash('Se ha registrado el alumno en el grupo')->success();

            return response($data);
        }
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
    }
}
