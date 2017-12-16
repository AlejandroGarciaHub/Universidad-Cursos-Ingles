<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group_Student;

use App\Student;
use App\Group;
use App\Aproved_Level;
use App\Payment;

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

    public function calificaciones($group,Request $request){
      $group_students=Group_Student::where('grupo_id','=',$group)->get();

      $group=Group::find($group);


      $aproved_levels_array=[];
      foreach ($group_students as $group_student) {
        # code...
        $aproved_levels_array[]=Aproved_Level::where('alumno_grupo_id','=',$group_student->id)->get();
      }

      $careers=Career::orderBy('nombre','DESC')->pluck('id','nombre');


      if (isset($group_students[0])) {
        # code...
        return view('admin.group_students.calificaciones')->with('group_students',$group_students)->with('grupo',$group)->with('aproved_levels_array',$aproved_levels_array)->with('careers',$careers)->with('group',$group);
      }
      else {
        # code...
        flash('No hay alumnos en este grupo')->error();
        return redirect('admin/groups');

      }
    }

    public function pagos($group){
      $group_students=Group_Student::where('grupo_id','=',$group)->get();
      $group=Group::find($group);


      $pagos_array=[];
      foreach ($group_students as $group_student) {
        # code...
        $pagos_array[]=Payment::where('alumno_grupo_id','=',$group_student->id)->get();
      }

      if (isset($group_students[0])) {
        # code...
        return view('admin.group_students.pagos')->with('group_students',$group_students)->with('grupo',$group)->with('pagos_array',$pagos_array)->with('group',$group);
      }
      else {
        # code...
        flash('No hay alumnos en este grupo')->error();
        return redirect('admin/groups');

      }


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

        return redirect()->route('admin.group_students.calificaciones',$group_student->grupo->id);
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

    public function actualizar_pago(Request $request, $id)
    {
      $data=$request->all();

      $nombres=$request->nombres;
      $apellidos=$request->apellidos;
      $numero_control=$request->numero_control;

      $pago1=$request->pago1;
      $pago2=$request->pago2;
      $pago3=$request->pago3;
      $pagado=$request->pagado;

      if($request->ajax()) {

        $group_student = Group_Student::find($request->id);
        $student=Student::find($group_student->alumno->id);
        $student->nombres=$nombres;
        $student->apellidos=$apellidos;
        $student->numero_control=$numero_control;

        $group=Group::find($group_student->grupo_id);

        $tam=$group_student->niveles_pagados->count();

        if ($tam==0) {
          # code...
          $payment= new Payment;
          $payment->monto=$pago1;
          $group_student->niveles_pagados()->save($payment);

          $paymentDos= new Payment;
          $paymentDos->monto=$pago2;
          $group_student->niveles_pagados()->save($paymentDos);

          $paymentTres= new Payment;
          $paymentTres->monto=$pago3;
          $group_student->niveles_pagados()->save($paymentTres);
        }
        else {
          # code...
          $payment=$group_student->niveles_pagados->first();
          $payment->monto=$pago1;
          $group_student->niveles_pagados()->save($payment);

          $paymentDos=$group_student->niveles_pagados()->skip(1)->first();
          $paymentDos->monto=$pago2;
          $group_student->niveles_pagados()->save($paymentDos);

          $paymentTres=$group_student->niveles_pagados()->skip(2)->first();
          $paymentTres->monto=$pago3;
          $group_student->niveles_pagados()->save($paymentTres);
        }


        return response($data);
      }
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
        $calificacion2=$request->calificacion2;

        $uno=$request->uno;
        $dos=$request->dos;

        if($request->ajax()) {
            $group_student = Group_Student::find($request->id);
            $student=Student::find($group_student->alumno->id);
            $student->nombres=$nombres;
            $student->apellidos=$apellidos;
            $student->numero_control=$numero_control;
            $student->carrera_id=$carrera_id;

            $group=Group::find($group_student->grupo_id);

            $tam=$aproved_level=$group_student->niveles_aprobados->count();


            if ($tam==0) {
              # code...
              $aproved_level= new Aproved_Level;
              $aproved_level->calif=$calificacion;
              $aproved_level->alumno_grupo_id=$group_student->id;
              $aproved_level->numero_nivel=$uno;
              $aproved_level->save();

              $aproved_levelDos= new Aproved_Level;
              $aproved_levelDos->calif=$calificacion2;
              $aproved_levelDos->alumno_grupo_id=$group_student->id;
              $aproved_levelDos->numero_nivel=$dos;
              $aproved_levelDos->save();
            }
            else {
              # code...
              $aproved_level=$group_student->niveles_aprobados->first();
              $aproved_level->numero_nivel=$uno;
              $aproved_level->calif=$calificacion;
              $aproved_level->save();

              $aproved_levelDos=$group_student->niveles_aprobados()->skip(1)->first();
              $aproved_levelDos->numero_nivel=$dos;
              $aproved_levelDos->calif=$calificacion2;
              $aproved_levelDos->save();

            }


            $inscripciones=$student->inscripciones;

            $promedio=0;
            $numerador=0;
            $denominador=0;
            foreach ($inscripciones as $grupo_cursado) {
              # code...
              $niveles_aprobados_grupo=$grupo_cursado->niveles_aprobados;
              foreach ($niveles_aprobados_grupo as $nivel_aprobado) {
                # code...
                $numerador+=$nivel_aprobado->calif;
                $denominador++;
              }
            }
            $promedio=$numerador/$denominador;
            $student->promedio=$promedio;
            $student->save();

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
        $group_student=Group_Student::find($id);
        $group_student->delete();

        flash('Se eliminó el alumno del grupo')->error();

        return redirect()->route('admin.group_students.calificaciones',$group_student->grupo->id);
    }
}
