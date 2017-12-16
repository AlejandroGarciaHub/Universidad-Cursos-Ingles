<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default') | Administración</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css')}}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="fondo">
    <div id="app">
      @include('admin.template.partials.nav')

      <section style="margin-top:5%;">
        @include('flash::message')
        @include('admin.template.partials.errors')
        @yield('content')
      </section>
    </div>

    <!-- Scripts -->

    <script src="{{ URL::asset('plugins/jquery/js/jquery-3.2.1.js')}}"></script>
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

{{--    <script src="{{ asset('js/app.js') }}"></script> --}}

</body>
</html>
