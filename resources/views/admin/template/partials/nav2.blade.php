<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Ingles</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('users.index')}}">Usuarios <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Alumnos</a></li>
        <li><a href="#">Pagos</a></li>



        <li class="dropdown">
          <a href="{{route('generations.index')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Generaciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('generations.index')}}">Todas</a></li>
            <li><a href="#">2012</a></li>
            <li><a href="#">2013</a></li>
            <li><a href="#">2014</a></li>
            <li><a href="#">2015</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">2016</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">2017</a></li>
          </ul>
        </li>


      </ul>


{{--
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    --}}


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
