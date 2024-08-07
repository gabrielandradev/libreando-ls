<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libreando | Registrarse</title>
</head>

<body>
    <h1>Registrarse</h1>
    <a href="{{url('/registrarse/profesores')}}">Profesores</a>
    <a href="{{url('/registrarse/estudiantes')}}">Estudiantes</a>
</body>

</html>