<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libreando | Registrarse</title>
</head>

<body>
    <!-- Crear form de registro -->
    <form action="/registrarse/estudiantes" method="POST">
    @csrf
        Nombre: <input type="text" name="nombre"><br>
        Apellido: <input type="text" name="apellido"><br>
        DNI: <input type="text" name="dni"><br>
        E-mail: <input type="text" name="email"><br>
        Telefono: <input type="text" name="telefono"><br>
        Año: <input type="text" name="año"><br>
        División: <input type="text" name="division"><br>
        Especialidad: <input type="text" name="especialidad"><br>
        Turno: <input type="text" name="turno"><br>
        Localidad: <input type="text" name="localidad"><br>

        <input type="submit">
    </form>
</body>

</html>