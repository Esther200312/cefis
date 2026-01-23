<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APP</title>
</head>
<body>
    <header>
        <h1>
            Administracion de certificados
        </h1>
        <p>
            FIS-UNCP
        </p>
        @auth
            <a href="{{route('logout')}}">Salir</a>
        @endauth
    </header>
    <div>
        @yieLd('contenido')
    </div>
</body>

</html>