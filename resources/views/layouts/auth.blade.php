<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Default') | Administración</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom.css')}}">

    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ URL::asset('icons/manifest.json')}}">
    <link rel="mask-icon" href="{{ URL::asset('icons/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    
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
