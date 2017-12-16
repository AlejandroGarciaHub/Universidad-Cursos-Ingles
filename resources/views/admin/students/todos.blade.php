@extends('layouts.app')

@section('title','Todos los alumnos')

@section('content')


  <div class="well-medium">
    <h1 class="text-center">Generaciones</h1>
  </div>

{{--
    <div>
      {!!Form::open(['route'=>'students.todos','method'=>'GET','class'=>'form-inline pull-right'])!!}
          {!!Form::text('nombres',null,['class'=>'form-control mr-sm-2','placeholder'=>'Buscar alumno','aria-label'=>'search'])!!}
          {!!Form::submit('Buscar',['class'=>'btn btn-outline-success my-2 my-sm-0y']) !!}
      {!!Form::close()!!}
    </div>
    --}}
    <br>
    <hr>



    <ul  class="nav nav-pills" style="background-color:white;">

      <li class="active">
        <a  href="#todas" data-toggle="tab">Todas</a>
      </li>
      @foreach ($generations as $generation)
        <li><a href="#{{$generation->year}}" data-toggle="tab">{{$generation->year}}</a>
      @endforeach
    </ul><br>
    <div class="panel panel-default">
      <div class="panel-heading">
        @php
          $countTotal=0;
          $countTotal =count($students);
        @endphp
      <h3 class="panel-title">Alumnos de la generacion {{$generation->year}} <section value="{{$countTotal}}" class="pull-right">
      </section></h3>
    </div>
      <div class="panel-body">
    			<div class="tab-content clearfix">

            @foreach ($generations as $generation )
              <div class="tab-pane fade in " data-toggle="tab" id="{{$generation->year}}">

                @php
                  $count=0;
                @endphp
                @foreach ($students as $student)
                  @if ($student->generacion_id==$generation->id)
                    @php
                      $count++;
                    @endphp
                  @endif
                @endforeach

                <table id="{{$count}}" class="table table-striped">
                  <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>N° de control</th>
                    <th>Carrera</th>
                {{--    <th>Generacion</th>
                    <th>Nivel</th>--}}
                    @if (Auth::user()->type == 'admin')
                      <th>Editar | Eliminar</th>
                    @endif
                  </thead>


                  <tbody >
                    @foreach ($students as $student)
                      @if ($student->generacion_id==$generation->id)
                        @php
                          $count++;
                        @endphp
                      <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->nombres}} {{$student->apellidos}}</td>
                        <td>{{$student->numero_control}}</td>
                        <td>{{$student->career->nombre}}</td>
                  {{--       <td>{{$student->generation->year}}</td>
                       <td>{{$student->nivel}}</td>--}}
                        </td>
                        @if (Auth::user()->type == 'admin')
                        <td><a href="{{route('students.edit',$student->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
                          <a href="{{route('admin.students.destroy',$student->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
                        @endif
                      </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
      				</div>
            @endforeach
    			  <div class="tab-pane active" id="todas">
              <table class="table table-striped table-hover">
                <thead>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>N° de control</th>
                  <th>Carrera</th>
              {{--    <th>Generacion</th>
                  <th>Nivel</th>--}}
                  @if (Auth::user()->type == 'admin')
                    <th>Editar | Eliminar</th>
                  @endif
                </thead>
                <tbody>
                  @foreach ($students as $student)
                    <tr>
                      <td>{{$student->id}}</td>
                      <td>{{$student->nombres}} {{$student->apellidos}}</td>
                      <td>{{$student->numero_control}}</td>
                      <td>{{$student->career->nombre}}</td>
                {{--       <td>{{$student->generation->year}}</td>
                     <td>{{$student->nivel}}</td>--}}
                      @if (Auth::user()->type == 'admin')
                      <td><a href="{{route('students.edit',$student->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
                        <a href="{{route('admin.students.destroy',$student->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a>
                      </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
    				</div>

    			</div>


  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
      $('h3.panel-title').text('Alumnos de todas las generaciones');
      $('h3.panel-title').append('<section value="{{$countTotal}}" class="pull-right">Numero de alumnos: {{$countTotal}}</section>');
      var count=$('h3.panel-title').find('section').attr('value');
      console.log(count);

      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target); // activated tab
        var t=target.attr("href");
        var newT = t.replace('#', '');
        if (newT!='todas') {

          var id=$(this).closest('section').find('ul.nav').find('li.active').find('a').text();
          var countCantidad=$(this).closest('section').find('div.panel').find('div.panel-body').find('div.tab-content').find('div.tab-pane#'+id).find('table').attr('id');

          $(this).closest('section').find('div.panel').find('h3.panel-title').find('section.pull-right').remove();
          $(this).closest('section').find('div.panel').find('h3.panel-title').text('Generacion '+newT);

          $(this).closest('section').find('div.panel').find('h3.panel-title').append('<section value="{{$count}}" class="pull-right">Numero de alumnos: '+countCantidad+'</section>');

        }
        else {
          $(this).closest('section').find('div.panel').find('h3.panel-title').find('section.pull-right').remove();
          $(this).closest('section').find('div.panel').find('h3.panel-title').text('Alumnos de todas las generaciones');

          $(this).closest('section').find('div.panel').find('h3.panel-title').append('<section value="{{$countTotal}}" class="pull-right">Numero de alumnos: {{$countTotal}}</section>');

        }
    });
  });

  </script>
@endsection
