<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Administración de Ingles | Panel de Control</title>



      <link rel="stylesheet" href="{{ asset('index/css/style.css')}}">


</head>

<body>
  <div id="wrap">
  <div id="regbar">
    <div id="navthing" style="align:margin-right;">
      <h2><a href="{{ route('login') }}" id="loginfor-m">Ingresar</a></a></h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
           <fieldset>
             <label name="email">Email</label>
             <input type="email" value="ejemplo@ejemplo.com" />
             <label name="password">Contraseña</label>
             <input type="password" />
             <input type="submit" value="Login" />

           </fieldset>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
    <script  src="{{asset('index/js/index.js')}}"></script>

<h2 id="title" align="center">Administracion de ingles</h2>
</body>
</html>
