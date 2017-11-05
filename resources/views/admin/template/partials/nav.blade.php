<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- config('app.name', 'Laravel') --}}
                Administracion - Ingles
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Ingresar</a></li>

                  {{--
                    <li><a href="{{ route('register') }}">Registrar</a></li>
                  --}}

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{route('teachers.index')}}">Administrar teachers</a></li>
                          <li><a href="{{route('generations.index')}}">Administrar generaciones</a></li>
                          <li><a href="{{route('careers.index')}}">Administrar carreras</a></li>
                          <li><a href="{{route('levels.index')}}">Administrar niveles</a></li>
                            <li id="logout">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

            @guest
              {{--
              If NOT guest
              --}}
            @else

              <ul class="nav navbar-nav" id="myTab">
                <li class="{{ active('users.index') }}"><a href="{{route('users.index')}}">Usuarios <span class="sr-only">(current)</span></a></li>
                <li class="{{ active('students.index') }}"><a href="{{route('students.index')}}">Alumnos</a></li>
                <li class="{{ active('aproved_levels.index') }}"><a href="{{route('aproved_levels.index')}}">Calificaciones</a></li>
                <li class="{{ active('payments.index') }}"><a href="{{route('payments.index')}}">Pagos</a></li>
                <li class="{{ active('groups.index') }}"><a href="{{route('groups.index')}}">Grupos</a></li>



                <li class="{{ active('generations.*') }} {{ active('students.search.*') }} dropdown">
                  <a href="{{route('generations.index')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generaciones <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('students.todos')}}">Todas</a></li>
                    <li role="separator" class="divider"></li>
                    @for ($i=0; $i < $countGenerations-1; $i++)
                      @php
                        $generation=$generations[$i];
                      @endphp
                      <li><a href="{{route('students.search.generation',$generation->year)}}">{{$generation->year}}</a></li>
                    @endfor
                    @if ($countGenerations>0)
                      @php
                          $generation=$generations[$countGenerations-1];
                      @endphp
                      @if ($countGenerations>1)
                        <li role="separator" class="divider"></li>
                      @endif
                      <li><a href="{{route('students.search.generation',$generation->year)}}">{{$generation->year}}</a></li>
                    @endif
                  </ul>
                </li>
                <li class="{{ active('aproved_levels.*') }}"><a href="{{route('aproved_levels.create')}}">Registrar calificacion</a></li>
                <li class="{{ active('payments.*') }}"><a href="{{route('payments.create')}}">Registrar pago</a></li>


              </ul>


        {{--
              <form class="navbar-form navbar-left">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            --}}


            @endguest

        </div>
    </div>
</nav>
