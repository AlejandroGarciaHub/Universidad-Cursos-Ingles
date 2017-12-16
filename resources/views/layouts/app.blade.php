<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Inicio') | Administración</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/select2/css/select2.min.css')}}">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.timepicker.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.timepicker.min.js')}}"></script>

    @yield('scripts_head')

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body class="fondo">
    <div id="app">
      @include('admin.template.partials.nav')

      <section id="13" style="margin-left:5%;margin-right:5%;margin-top:4%;">
        @include('flash::message')
        @include('admin.template.partials.errors')
        @yield('content')
      </section>
    </div>

    <!-- Scripts -->

{{--    <script src="{{ URL::asset('plugins/jquery/js/jquery-3.2.1.js')}}"></script> --}}
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ URL::asset('plugins/select2/js/select2.min.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#alumno_id').select2();

        $('#timepicker').timepicker({ 'timeFormat': 'g:i a' });
    });
    </script>

@yield('scripts')
{{--    <script src="{{ asset('js/app.js') }}"></script> --}}

</body>

</html>
