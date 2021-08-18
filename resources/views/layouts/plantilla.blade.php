<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <h1>COTISAZACIONES BONFIL</h1>
    <h2><a href="{{route('usuario')}}"></a> usuario</h2>
    <h2><a href="{{route('emailRecovery')}}"></a> emailrecovery</h2>
    <h2><a href="{{route('emailTest')}}"></a> email</h2>
    <p>Modificaciones hechas a fuerza</p>
    @yield('contenido')
</body>
</html>