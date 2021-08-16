<?php if(!isset($_GET['email'])){ return back();}?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/plantillafront.css')}}">
    <title>Cambiando contraseña</title>
</head>
<body>
<form action="{{route('emailRecoveryPost')}}" method="POST">
    @csrf
        <h2>Restablecer contraseña</h2>
        <input type="email" name="email" value="{{$_GET['email']}}" sytle="font-size: 25px" readonly><br>
        <input type="text" name="password" placeholder="Contraseña Nueva" sytle="font-size: 25px"><br>
        <input type="number" name="token" placeholder="Ingresa codigo(6 digitos)" sytle="font-size: 25px">
        <input type="submit" value="Regenerar" sytle="font-size: 25px">
    </form>
</article>
<a href="#">Mis redes sociales xD</a>
</body>
</html>
<!--ESTA ES LA VISTA-PLANTILLA  DONDE SE PIDE EL TOKEN QUE SE ENVIO AL CORREO DEL SOLICITANTE
ESTE ES PARTE DEL API DE AQUI REDIRIGE AL CONTROLADOR emailRecoveryPost() QUE VALIDARA QUE EL
EMAIL ESTE EN LA BD Y QUE EL TOKEN ESTE EN EL REGISTRO DEL USUARIO-->

       
    
