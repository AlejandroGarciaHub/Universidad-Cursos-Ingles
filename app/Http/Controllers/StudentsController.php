<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Career;
use App\Generation;
use App\Payment;
use App\Aproved_Level;

use App\Http\Requests\StudentRequest;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $students=Student::search($request->nombres)->orderBy('id','ASC')->paginate(5);

        $aproved_levels_array;
        foreach ($students as $student) {
          # code...
          $inscripciones=$student->inscripciones;
          foreach ($inscripciones as $inscripcion) {
            # code...
            $aproved_levels_array[]=$inscripcion->niveles_aprobados;
          }
          if (sizeof($inscripciones)<1) {
            # code...
            $aproved_levels_array[]=[];
          }
        }


        return view('admin.students.index')->with('students',$students)->with('aproved_levels_array', $aproved_levels_array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $careers=Career::orderBy('nombre','ASC')->pluck('nombre','id');
        $generations=Generation::orderBy('year','ASC')->pluck('year','id');


        return view('admin.students.create')->with('careers',$careers)->with('generationsPluck',$generations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //
        $student= new Student($request->all());
        $student->save();


        flash('Se ha registrado un nuevo estudiante')->success();

        return redirect()->route('students.index');
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

        $student=Student::find($id);
        $payments=$student->payments;
        $aproved_levels=$student->aproved_levels;
//        dd($payments);
        return view('admin.students.show')->with('student',$student)->with('payments',$payments)->with('aproved_levels',$aproved_levels);
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
        $careers=Career::orderBy('nombre','ASC')->pluck('nombre','id');
        $generations=Generation::orderBy('year','ASC')->pluck('year','id');

        $student=Student::find($id);
//        dd($student);

        return view('admin.students.edit')->with('student',$student)->with('careers',$careers)->with('generationsPluck',$generations);
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
        $student=Student::find($id);

        $student->fill($request->all());

        $student->save();


        flash('Los datos del alumno han sido editados satisfactoriamente')->success();

        return redirect()->route('students.index');
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
        $student=Student::find($id);
        $student->delete();

        flash('El alumno ha sido correctamente eliminada')->error();

        return redirect()->route('students.index');
    }

    public function searchGeneration($year){
      $generation=Generation::SearchGeneration($year)->first();
      $students=$generation->students;
      $students->each(function($students){
        $students->generation;
        $students->career;
      });

      return view('admin.students.index')->with('students',$students);
    }

    public function searchGenerationAll(Request $request){
      $students=Student::search($request->nombres)->orderBy('id','DESC')->paginate(5);

      return view('admin.students.todos')->with('students',$students);
    }

}
