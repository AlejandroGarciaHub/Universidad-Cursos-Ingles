@extends('layouts.app')

@section('title','Pagos')

@section('content')
  <a href="{{route('payments.create')}}" class="btn btn-info">Registrar pago</a>
  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Nivel</th>
      <th>Alumno</th>
      <th>Monto</th>
      @if (Auth::user()->type == 'admin')
        <th>Editar | Eliminar</th>
      @endif
    </thead>
    <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td>{{$payment->id}}</td>
          <td>{{$payment->level->descripcion_nivel}}</td>
          <td>{{$payment->student->nombres}} {{$payment->student->apellidos}}</td>
          <td>$ {{$payment->monto}}</td>
          @if (Auth::user()->type == 'admin')
          <td><a href="{{route('payments.edit',$payment->id)}}" class="glyphicon glyphicon-pencil" style="color:green; margin-left:3%;margin-right:5%;"></a>
            <a href="{{route('admin.payments.destroy',$payment->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el pago?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
