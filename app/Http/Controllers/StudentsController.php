<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Career;
use App\Generation;
use App\Payment;
use App\Aproved_Level;

use DateTime;
use DateTimeZone;

use Illuminate\Support\Collection;

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
        $students=Student::search($request->nombres)->orderBy('id','ASC')->get();

        $aproved_levels_array=[];
        $i=0;
        foreach ($students as $student) {
          # code...
          $i++;
          $groups_student=$student->inscripciones;
          $aproved_levels=[[],[],[],[],[],[],[],[]];
          foreach ($groups_student as $group_student) {
            # code...
            if (!empty($group_student->niveles_aprobados[0])) {
              # code...
              $aproved_levels[$group_student->niveles_aprobados[0]->numero_nivel-1]=$group_student->niveles_aprobados[0];
            }
            if (!empty($group_student->niveles_aprobados[0])) {
              # code...
              $aproved_levels[$group_student->niveles_aprobados[1]->numero_nivel-1]=$group_student->niveles_aprobados[1];
            }
          }
          $aproved_levels_array[]=$aproved_levels;
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
    public function update(StudentRequest $request, $id)
    {
        //
        $student=Student::find($id);

        $student->fill($request->all());

        $student->save();


        flash('Los datos del alumno han sido editados satisfactoriamente')->success();

        return redirect()->route('students.index');
    }

    public function actualizar(StudentRequest $request, $id)
    {


      $nombres=$request->nombres;
      $apellidos=$request->apellidos;
      $numero_control=$request->numero_control;

      $calif1=$request->calif1;
      $calif2=$request->calif2;
      $calif3=$request->calif3;
      $calif4=$request->calif4;
      $calif5=$request->calif5;
      $calif6=$request->calif6;
      $calif7=$request->calif7;
      $calif8=$request->calif8;
      $promedio=$request->promedio;

      if($request->ajax()) {

        $student = Student::find($request->id);
        $student->nombres=$nombres;
        $student->apellidos=$apellidos;
        $student->numero_control=$numero_control;

        $student_groups=$student->inscripciones;

        $aproved_levels_collection=[];
        foreach ($student_groups as $grupo_cursado) {
          # code...
          $aproved_levels_group=$grupo_cursado->niveles_aprobados->all();

          foreach ($aproved_levels_group as $aproved_group) {
            # code...
            $aproved_levels_collection[]=$aproved_group;
          }
        }
        $sizeArray= sizeof($aproved_levels_collection);
        if ($calif1!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==1) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif1;
              $aproved_level->save();
            }
          }
        }

        if ($calif2!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==2) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif2;
              $aproved_level->save();
            }
          }
        }

        if ($calif3!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==3) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif3;
              $aproved_level->save();
            }
          }
        }

        if ($calif4!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==4) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif4;
              $aproved_level->save();
            }
          }
        }

        if ($calif5!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==5) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif5;
              $aproved_level->save();
            }
          }
        }

        if ($calif6!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==6) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif6;
              $aproved_level->save();
            }
          }
        }

        if ($calif7!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==7) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif7;
              $aproved_level->save();
            }
          }
        }

        if ($calif8!=0) {
          # code...
          for ($i=0; $i <$sizeArray ; $i++) {
            # code...
            if ($aproved_levels_collection[$i]->numero_nivel==8) {
              # code...
              $id=$aproved_levels_collection[$i]->id;

              $aproved_level=Aproved_Level::find($id);

              $aproved_level->calif=$calif8;
              $aproved_level->save();
            }
          }
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
        if ($denominador!=0) {
          # code...
          $promedio=$numerador/$denominador;
        }
        $student->promedio=$promedio;
        $student->save();

        $request->offsetSet('promedio', $promedio);
        $data=$request->all();

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

    public function generateConstancia($id)
    {
      # code...

      $unidades=[
        0=>'',
        1=>' y Uno',
        2=>' y Dos',
        3=>' y Tres',
        4=>' y Cuatro',
        5=>' y Cinco',
        6=>' y Seis',
        7=>' y Siete',
        8=>' y Ocho',
        9=>' y Nueve'
      ];
      $decenas=[
        6=>'Sesenta',
        7=>'Setenta',
        8=>'Ochenta',
        9=>'Noventa'
      ];


      $phpWord = new \PhpOffice\PhpWord\PhpWord();

      $path=public_path('docs/constancia_niveles.docx');
      $template = new \PhpOffice\PhpWord\TemplateProcessor($path);

      #Obtener datos alumno
      $student=Student::find($id);

      $nombres=$student->nombres;
      $apellidos=$student->apellidos;
      $nombre_completo=$nombres.' '.$apellidos;
      $nombre_completo=strtoupper($nombre_completo);

      $numero_control=$student->numero_control;
      $carrera=$student->career->nombre;
      $carrera=strtoupper($carrera);

      $promedio=$student->promedio;

      $promedio_letra;
      if ($promedio==100) {
        # code...
        $promedio_letra='Cien';
      }
      else {
        # code...
        $primer_digito=substr($promedio, 0, 1);
        $segundo_digito=substr($promedio, 1, 1);
        $promedio_letra=$decenas[$primer_digito].$unidades[$segundo_digito];
      }

      $dia;
      $mes;
      $año;

      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      $anios = array("uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once","doce","trece","catorce","quince","dieciséis","diecisiete","dieciocho","diecinueve","veinte","veintiuno","veintidós","veintitrés","veinticuatro","veinticinco","veintiséis","veintisiete","veintiocho","veintinueve","treinta");

      $tz = 'America/Mexico_City';
      $timestamp = time();
      $now = new DateTime("now", new DateTimeZone($tz));
//      $dia=$now->format('d-m-Y H:i:s');

      $dia=$now->format('d');

      $mes=$now->format('m');
      $mes=$meses[$mes-1];
      $mes=strtolower($mes);

      $anio=$now->format('y');
      $anio=$anios[$anio-1];

      $template->setValue('nombre_completo', $nombre_completo);
      $template->setValue('numero_control', $numero_control);
      $template->setValue('carrera', $carrera);
      $template->setValue('promedio', $promedio);
      $template->setValue('promedio_letra', $promedio_letra);

      $template->setValue('dia', $dia);
      $template->setValue('mes', $mes);
      $template->setValue('anio', $anio);

      $path_out=public_path('docs/generated.docx');
      $template->saveAs($path_out);


      $file = $path_out;
    	$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    	$nombre_documento = $numero_control.'_timestamp('.time().').docx';

    	return response()->download($file, $nombre_documento, $headers);

      flash('Constancia generada!')->error();

      return redirect()->action('StudentsController@index');
    }

}
