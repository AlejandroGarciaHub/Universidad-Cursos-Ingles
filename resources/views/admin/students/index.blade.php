@extends('layouts.app')

@section('title','Alumnos')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Alumnos</h1>
  </div>


    <a href="{{route('students.create')}}" class="btn btn-success">Nuevo alumno</a>

    <span class="">
      {!!Form::open(['route'=>'students.index','method'=>'GET','class'=>'form-inline pull-right'])!!}
          {!!Form::text('nombres',null,['class'=>'form-control mr-sm-2','placeholder'=>'Buscar alumno','aria-label'=>'search'])!!}
          {!!Form::submit('Buscar',['class'=>'btn btn-outline-success my-2 my-sm-0y']) !!}
      {!!Form::close()!!}
    </span><hr>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Alumnos</h3>
    </div>
  <div class="panel-body">

    <table class="table table-striped">
      <thead>
        <th hidden="hidden">ID</th>
        <th>Nombre</th>
        <th>N° de control</th>
{{--
        <th>Carrera</th>
--}}
        <th>N 1</th>
        <th>N 2</th>
        <th>N 3</th>
        <th>N 4</th>
        <th>N 5</th>
        <th>N 6</th>
        <th>N 7</th>
        <th>N 8</th>
        <th>Promedio</th>
        {{-- <th>Generacion</th> --}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
        <th>Constancia</th>
      </thead>
      <tbody>
        @foreach ($students as $index => $student)
          <tr>
            <td id="id" hidden="hidden" class="id" value="{{$student->id}}">{{$student->id}}</td>
            <td id="nombres" value="{{$student->nombres}}">{{$student->nombres}} {{$student->apellidos}}</td>
            <input type="hidden" id="apellidos" value="{{$student->apellidos}}"></input>
            <td id="numero_control" value="{{$student->numero_control}}">{{$student->numero_control}}</td>
{{--
            <td>{{$student->career->nombre}}</td>
--}}
{{--             <td>{{$student->generation->year}}</td> --}}

            @php
              $numerador=0;
              $denominador=0;

              $termino_ultimo_nivel=false;
            @endphp
                         @php
                           $aproved_level=$aproved_levels_array[$index];
                         @endphp
                           @for ($i=0; $i < 8; $i++)
                                @if (!empty($aproved_level[$i]))
                                  <td id="calif{{$i+1}}" value="{{$aproved_level[$i]->calif}}">{{$aproved_level[$i]->calif}}</td>
                                  @php
                                    $numerador+=$aproved_level[$i]->calif;
                                    $denominador++;
                                  @endphp
                                @else
                                  <td id="calif{{$i+1}}" value="0">0</td>
                                @endif

                                @if (!empty($aproved_level[7]))
                                  @php
                                  $termino_ultimo_nivel=true;
                                  @endphp
                                @endif
                        @endfor

               @if ($denominador!=0)
                 @php
                   $promedio=$numerador/$denominador;
                   $promedio=round($promedio);
                 @endphp
                 <td id="promedio" value="{{$promedio}}"><button class="btn btn-primary" type="button" name="button">{{$promedio}}</button></td>
                 @else
                   <td id="promedio" value="0"><button class="btn btn-primary" type="button" name="button">0</button></td>
               @endif

      {{--     <td>{{$student->nivel}}</td>--}}
            @if (Auth::user()->type == 'admin')
            <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:13%;margin-right:22%;"></a>
              <a href="{{route('admin.students.destroy',$student->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a>
            </td>
            @endif
            @if ($termino_ultimo_nivel==true)
              <td id="constancia" value="si"><a href="{{route('admin.students.generateConstancia',$student->id)}}">
                    <button class="btn btn-success" type="submit" name="button">Generar</button>
                  </a>
              </td>
            @else
              <td id="constancia" value="no"> - </td>
            @endif
          </tr>

        @endforeach
      </tbody>
    </table>

  </div>
</div>


    <script type="text/javascript">
        $(document).click(function(){

          $('.editar').unbind().click(function(){

            var DOM=$(this).parent('td').parent('tr');
            var id=DOM.children('#id').attr('value');
            var nombres=DOM.children('#nombres').attr('value');
            var apellidos=DOM.children('#apellidos').attr('value');
            var numero_control=DOM.children('#numero_control').attr('value');

            var calif1=DOM.children('#calif1').attr('value');
            var calif2=DOM.children('#calif2').attr('value');
            var calif3=DOM.children('#calif3').attr('value');
            var calif4=DOM.children('#calif4').attr('value');
            var calif5=DOM.children('#calif5').attr('value');
            var calif6=DOM.children('#calif6').attr('value');
            var calif7=DOM.children('#calif7').attr('value');
            var calif8=DOM.children('#calif8').attr('value');

            var promedio=DOM.children('#promedio').attr('value');
            var constancia=DOM.find('#constancia').attr('value');

            console.log(constancia);

            var elementCalif1='';
            var elementCalif2='';
            var elementCalif3='';
            var elementCalif4='';
            var elementCalif5='';
            var elementCalif6='';
            var elementCalif7='';
            var elementCalif8='';
            var elementoPromedio='';

            if (calif1==0) {
              elementCalif1='<td id="calif1" value="'+calif1+'">'+calif1+'</td>';
            }
            else {
              elementCalif1='<td> <input class="form-control" id="calif1" type="text" name="calif1" value="'+calif1+'"> </td>';
            }

            if (calif2==0) {
              elementCalif2='<td id="calif2" value="'+calif2+'">'+calif2+'</td>';
            }
            else {
              elementCalif2='<td> <input class="form-control" id="calif2" type="text" name="calif2" value="'+calif2+'"> </td>';
            }

            if (calif3==0) {
              elementCalif3='<td id="calif3" value="'+calif3+'">'+calif3+'</td>';
            }
            else {
              elementCalif3='<td> <input class="form-control" id="calif3" type="text" name="calif3" value="'+calif3+'"> </td>';
            }

            if (calif4==0) {
              elementCalif4='<td id="calif4" value="'+calif4+'">'+calif4+'</td>';
            }
            else {
              elementCalif4='<td> <input class="form-control" id="calif4" type="text" name="calif4" value="'+calif4+'"> </td>';
            }

            if (calif5==0) {
              elementCalif5='<td id="calif5" value="'+calif5+'">'+calif5+'</td>';
            }
            else {
              elementCalif5='<td> <input class="form-control" id="calif5" type="text" name="calif5" value="'+calif5+'"> </td>';
            }

            if (calif6==0) {
              elementCalif6='<td id="calif6" value="'+calif6+'">'+calif6+'</td>';
            }
            else {
              elementCalif6='<td> <input class="form-control" id="calif6" type="text" name="calif6" value="'+calif6+'"> </td>';
            }

            if (calif7==0) {
              elementCalif7='<td id="calif7" value="'+calif7+'">'+calif7+'</td>';
            }
            else {
              elementCalif7='<td> <input class="form-control" id="calif7" type="text" name="calif7" value="'+calif7+'"> </td>';
            }

            if (calif8==0) {
              elementCalif8='<td id="calif8" value="'+calif8+'">'+calif8+'</td>';
            }
            else {
              elementCalif8='<td> <input class="form-control" id="calif8" type="text" name="calif8" value="'+calif8+'"> </td>';
            }

            var hiddenConstancia='<input type="hidden" id="constancia" value="'+constancia+'"></input>';

            var outputElements=elementCalif1+elementCalif2+elementCalif3+elementCalif4+elementCalif5+elementCalif6+elementCalif7+elementCalif8+hiddenConstancia;


            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);

            console.log(calif1);
            console.log(calif2);
            console.log(calif3);
            console.log(calif4);
            console.log(calif5);
            console.log(calif6);
            console.log(calif7);
            console.log(calif8);
            console.log(promedio);


            $(this).parent('td').parent('tr').replaceWith(' <tr> <td id="id" hidden="hidden" class="id" value="'+id+'">'+id+'</td> <td id="nombre_completo"> <div class="form-group row"> <div id="nombres_div" class="col-md-6" style="width:150px;"> <input id="nombres" class="form-control" placeholder="" type="text" name="nombres" value="'+nombres+'"> </div> <div id="apellidos_div" class="col-md-6" style="width:150px;"> <input id="apellidos" class="form-control" placeholder="" type="text" name="apellidos" value="'+apellidos+'"> </div> </div> </td> <td> <input style="width:110px;" class="form-control" id="numero_control" type="text" name="numero_control" value="'+numero_control+'"> </td> '+outputElements+' <td id="promedio" value="'+promedio+'"><button class="btn btn-primary" type="button" name="button">'+promedio+'</button></td> <td> <div class=""> <button class="btn btn-success actualizar" type="button" name="button">Guardar</button> </div><div class=""> <button class="btn btn-warning cancelar" type="button" name="button">Cancelar</button> </div></td> </tr>');



          });

          $('.cancelar').unbind().click(function(){

            var DOM=$(this).parent('div').parent('td').parent('tr');

            var id=DOM.children('#id').attr('value');
            var nombres=DOM.find('#nombres').attr('value');
            var apellidos=DOM.find('#apellidos').attr('value');
            var numero_control=DOM.find('#numero_control').attr('value');


            var calif1=DOM.find('#calif1').attr('value');
            var calif2=DOM.find('#calif2').attr('value');
            var calif3=DOM.find('#calif3').attr('value');
            var calif4=DOM.find('#calif4').attr('value');
            var calif5=DOM.find('#calif5').attr('value');
            var calif6=DOM.find('#calif6').attr('value');
            var calif7=DOM.find('#calif7').attr('value');
            var calif8=DOM.find('#calif8').attr('value');

            var promedio=DOM.find('#promedio').attr('value');
            var constancia=DOM.find('#constancia').attr('value');

            var elementConstancia='';
            if (constancia=='si') {
              elementConstancia='<td id="constancia" value="si"><a href="/students/generateConstancia/'+id+'"> <button class="btn btn-success" type="submit" name="button">Generar</button> </a> </td>';
            }
            else {
              elementConstancia='<td id="constancia" value="no"> - </td>';
            }


            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);

            console.log(calif1);
            console.log(calif2);
            console.log(calif3);
            console.log(calif4);
            console.log(calif5);
            console.log(calif6);
            console.log(calif7);
            console.log(calif8);
            console.log(promedio);
            console.log(constancia);

            $(this).parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" hidden="hidden" class="id" value="'+id+'">'+id+'</td> <td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td> <input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><td id="calif1" value="'+calif1+'">'+calif1+'</td><td id="calif2" value="'+calif2+'">'+calif2+'</td><td id="calif3" value="'+calif3+'">'+calif3+'</td><td id="calif4" value="'+calif4+'">'+calif4+'</td><td id="calif5" value="'+calif5+'">'+calif5+'</td><td id="calif6" value="'+calif6+'">'+calif6+'</td><td id="calif7" value="'+calif7+'">'+calif7+'</td><td id="calif8" value="'+calif8+'">'+calif8+'</td><td id="promedio" value="'+promedio+'"><button class="btn btn-primary" type="button" name="button">'+promedio+'</button></td> @if (Auth::user()->type == 'admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:13%;margin-right:22%;"></a> <a href="/admin/students/'+id+'/destroy" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td> @endif '+elementConstancia+' </tr>');
          });

          $('.actualizar').unbind().click(function(){

            if(confirm('¿Estas seguro que deseas guardar los cambios?')){
              var DOM=$(this).parent('div').parent('td').parent('tr');
              var token="{{ csrf_token() }}";

              var id=DOM.children('#id').attr('value');
              var nombres=DOM.find('#nombres').val();
              var apellidos=DOM.find('#apellidos').val();
              var numero_control=DOM.find('#numero_control').val();

              var calif1=DOM.find('#calif1').val();
              var calif2=DOM.find('#calif2').val();
              var calif3=DOM.find('#calif3').val();
              var calif4=DOM.find('#calif4').val();
              var calif5=DOM.find('#calif5').val();
              var calif6=DOM.find('#calif6').val();
              var calif7=DOM.find('#calif7').val();
              var calif8=DOM.find('#calif8').val();

              var promedio=DOM.find('#promedio').attr('value');
              var constancia=DOM.find('#constancia').attr('value');

              var denominador=0;
              if (calif1!='') {
                denominador++;
              }
              if (calif2!='') {
                denominador++;
              }
              if (calif3!='') {
                denominador++;
              }
              if (calif4!='') {
                denominador++;
              }
              if (calif5!='') {
                denominador++;
              }
              if (calif6!='') {
                denominador++;
              }
              if (calif7!='') {
                denominador++;
              }
              if (calif8!='') {
                denominador++;
              }

              promedio=(Number(calif1)+Number(calif2)+Number(calif3)+Number(calif4)+Number(calif5)+Number(calif6)+Number(calif7)+Number(calif8))/denominador;
              promedio=promedio||0;

              promedio=Math.round(promedio);

              console.log(token);
              console.log(id);
              console.log(nombres);
              console.log(apellidos);
              console.log(numero_control);

              console.log(calif1);
              console.log(calif2);
              console.log(calif3);
              console.log(calif4);
              console.log(calif5);
              console.log(calif6);
              console.log(calif7);
              console.log(calif8);
              console.log(promedio);
              console.log(constancia);


              $.ajax({
                      url: "{{ URL::to('/admin/students/actualizar') }}"+"/"+id,
                      method:"GET",
                      data:{
                          _token: token,
                           id: id,
                           nombres: nombres,
                           apellidos: apellidos,
                           numero_control: numero_control,
                           calif1: calif1,
                           calif2: calif2,
                           calif3: calif3,
                           calif4: calif4,
                           calif5: calif5,
                           calif6: calif6,
                           calif7: calif7,
                           calif8: calif8,
                           promedio: promedio,
                           constancia: constancia
                    },
                    success: function( data ) {
                      console.log('Success!!');
                      console.log(data);


                        var id=data.id;
                        var nombres=data.nombres;
                        var apellidos=data.apellidos;
                        var numero_control=data.numero_control;
                        var calif1=data.calif1;
                        var calif2=data.calif2;
                        var calif3=data.calif3;
                        var calif4=data.calif4;
                        var calif5=data.calif5;
                        var calif6=data.calif6;
                        var calif7=data.calif7;
                        var calif8=data.calif8;
                        var constancia=data.constancia;

                        if (calif1==null) {
                          calif1=0;
                        }
                        if (calif2==null) {
                          calif2=0;
                        }
                        if (calif3==null) {
                          calif3=0;
                        }
                        if (calif4==null) {
                          calif4=0;
                        }
                        if (calif5==null) {
                          calif5=0;
                        }
                        if (calif6==null) {
                          calif6=0;
                        }
                        if (calif7==null) {
                          calif7=0;
                        }
                        if (calif8==null) {
                          calif8=0;
                        }

                        var elementConstancia='';
                        if (constancia=='si') {
                          elementConstancia='<td id="constancia" value="si"><a href="/students/generateConstancia/'+id+'"> <button class="btn btn-success" type="submit" name="button">Generar</button> </a> </td>';
                        }
                        else {
                          elementConstancia='<td id="constancia" value="no"> - </td>';
                        }


                        console.log('AJAX');
                        console.log(id);
                        console.log(nombres);
                        console.log(apellidos);
                        console.log(numero_control);

                        console.log(calif1);
                        console.log(calif2);
                        console.log(calif3);
                        console.log(calif4);
                        console.log(calif5);
                        console.log(calif6);
                        console.log(calif7);
                        console.log(calif8);
                        console.log(promedio);
                        console.log(denominador);


                      $('.actualizar').parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" hidden="hidden" class="id" value="'+id+'">'+id+'</td> <td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td> <input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><td id="calif1" value="'+calif1+'">'+calif1+'</td><td id="calif2" value="'+calif2+'">'+calif2+'</td><td id="calif3" value="'+calif3+'">'+calif3+'</td><td id="calif4" value="'+calif4+'">'+calif4+'</td><td id="calif5" value="'+calif5+'">'+calif5+'</td><td id="calif6" value="'+calif6+'">'+calif6+'</td><td id="calif7" value="'+calif7+'">'+calif7+'</td><td id="calif8" value="'+calif8+'">'+calif8+'</td><td id="promedio" value="'+promedio+'"><button class="btn btn-primary" type="submit" name="button">'+promedio+'</button></td> @if (Auth::user()->type == 'admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:13%;margin-right:22%;"></a> <a href="/admin/students/'+id+'/destroy" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td> @endif '+elementConstancia+' </tr>');


                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      console.log('ERROR');
                      console.log(data);
                      alert(xhr.status);
                      alert(thrownError);
                    }

                });
            }


          });

        });

        $(document).ready(function(){
          $(document).trigger('click');
        });
        $(document).on('page:change',function(){
          $(document).trigger('click');
        });
    </script>
@endsection
