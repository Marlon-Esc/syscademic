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
      <img class="mb-4" src="{{ asset('img/cademic.png') }}" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      
      <label for="User" class="sr-only">Usuario</label>
      <input id="name" type="name" placeholder="Escribe tu nombre..." class="text-center form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
      
      <label for="Password" class="sr-only">Contraseña</label>
      <input id="password" placeholder='Escribe tu contraseña...' type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
      @endif
      
      <button class="btn btn-lg btn-secondary btn-block" type="submit">Iniciar</button>
      <p class="mt-5 mb-3 text-muted"><a href="#">Olvidé mi contraseña</a></p>
    </form>
</body>
</html>

