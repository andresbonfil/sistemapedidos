<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
</head>
<!--ESTE ES LA VISTA PLANTILLA (recontraEmail.blade.php) DE RECUPERACION DE CONTRASEÑA 
ESTA PLANTILLA SIRVE PARA QUE SEA ENVIADA POR EL MAILER recontraEmail.php AQUI SE CARGAN
LOS DATOS NOMBRE EMAIL Y EL TOKEN CODERAND SE ANEXA UN VINCULO DIRECTO AL BACKEND PARA
PROPORCIONARLE EL TOKEN GENERADO SIN EL CUAL NO ADMITIRÁ MODIFICACIONES-->
<body>
<h1>Estamos recuperando tu contraseña...</h1>
    Estimado: <h1>{{$datos['nombre']}}</h1>
    <p>Ud. Ha solicitado el restablecimiento de su contraseña:</p>
    Asociada al correo: <b>{{$datos['email']}}</b><br>
    <p>Para generar una nueva contraseña copia el codigo:</p>
    <h1>{{$datos['code']}}</h1>
    <p>Y pegalo en el enlace que aparece a continuacion:</p>
    <p><a href="https://sistemapedidosback.herokuapp.com/emailRecovery?email={{$datos['email']}}" 
    style="font-size:16px; display: inline-block; background-color:blue; color:#fff;
    padding:12px; border-radius:4px; text-decoration: none;">Restablecer mi contraseña</a></p>
    <a href="https://sistemapedidosback.herokuapp.com/emailRecovery?email={{$datos['email']}}">https://sistemapedidosback.herokuapp.com/emailRecovery?email={{$datos['email']}}</a>
    <img src="http://uxproyect.000webhostapp.com/img/demo.jpg" alt="Pc Life Systems logo"
    style="width:300px">
</body>
</html>