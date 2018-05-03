<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Syscademic | login</title>
<link rel="icon" type="image/png" href="{{ asset('dist/img/calendar-b.png') }}" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="text-center">
    <form class="form-signin" action="{{ route('login') }}" method="post">
      @csrf
      <img class="mb-4" src="{{ asset('dist/img/calendar-b.png') }}" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      
      <label for="User" class="sr-only">Usuario</label>
      <input id="nc" type="text" class="form-control{{ $errors->has('nc') ? ' is-invalid' : '' }}" 
      placeholder="Nombre de usuario" name="nc" value="{{ old('nc') }}" required autofocus>
      @if ($errors->has('nc'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('nc') }}</strong>
          </span>
      @endif
      
      <label for="Password" class="sr-only">Contraseña</label>
      <input id="pass" type="password" class="form-control{{ $errors->has('pass') ? ' is-invalid' : '' }}" 
      placeholder="Contraseña" name="pass" value="{{ old('pass') }}" required>

      @if ($errors->has('pass'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('pass') }}</strong>
          </span>
      @endif
      
      <button class="btn btn-lg btn-secondary btn-block" type="submit">Iniciar</button>
      <p class="mt-5 mb-3 text-muted"><a href="#">Olvidé mi contraseña</a></p>
    </form>
</body>
</html>

