<?php if(!isset($_GET['email'])){ return back();}?>
<!--ESTA ES LA VISTA-PLANTILLA  DONDE SE PIDE EL TOKEN QUE SE ENVIO AL CORREO DEL SOLICITANTE
ESTE ES PARTE DEL API DE AQUI REDIRIGE AL CONTROLADOR emailRecoveryPost() QUE VALIDARA QUE EL
EMAIL ESTE EN LA BD Y QUE EL TOKEN ESTE EN EL REGISTRO DEL USUARIO
POR DESGRACIA NO CARGA LA PLANTILLA PLANTILLAFRONT.BLADE.PHP ESTILOS SE PONDRAN DIRECTAMENTE AQUI-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/plantillafront.css')}}">
    <title>Cambiando contraseña</title>
</head>
<body style="background: gray">
    <form action="{{route('emailRecoveryPost')}}" method="POST">
    @csrf
        <h2>Restablecer contraseña</h2>
        <input type="email" name="email" value="{{$_GET['email']}}" style="font-size: 25px" readonly><br>
        <input type="text" name="password" placeholder="Contraseña Nueva" style="font-size: 25px" required><br>
        <input type="number" name="token" placeholder="Ingresa codigo(6 digitos)" style="font-size: 25px" required><br>
        <input type="submit" value="Regenerar" style="font-size: 25px">
    </form>
</body>
</html>


       
    
