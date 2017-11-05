<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title','Default') | Administración</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/select2/css/select2.min.css')}}">
  </head>
  <body>
      @include('admin.template.partials.nav')

      <section style="margin-left:15%;margin-right:15%;margin-top:5%;">
        @include('flash::message')
        @include('admin.template.partials.errors')
        @yield('content')
      </section>

      <script src="{{ URL::asset('plugins/jquery/js/jquery-3.2.1.js')}}"></script>
      <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
      <script src="{{ URL::asset('plugins/select2/js/select2.js')}}"></script>
  </body>
</html>
