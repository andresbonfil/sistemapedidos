@extends('layouts.plantillafront')
@section('titulo','Sistema Pedidos')
<!--ESTA ES LA VISTA-PLANTILLA  DONDE SE PIDE EL TOKEN QUE SE ENVIO AL CORREO DEL SOLICITANTE
ESTE ES PARTE DEL API DE AQUI REDIRIGE AL CONTROLADOR emailRecoveryPost() QUE VALIDARA QUE EL
EMAIL ESTE EN LA BD Y QUE EL TOKEN ESTE EN EL REGISTRO DEL USUARIO-->
<?php if(!isset($_GET['email'])){ return back();}?>
@section('articulo2')        
    <form action="{{route('emailRecoveryPost')}}" method="POST">
    @csrf
        <h2>Restablecer contraseña</h2>
        <input type="email" name="email" value="{{$_GET['email']}}" readonly><br>
        <input type="text" name="password" placeholder="Contraseña Nueva"><br>
        <input type="number" name="token" placeholder="Ingresa codigo(6 digitos)">
        <input type="submit" value="Regenerar">
    </form>
</article>
@endsection
@section('piedepagina')
<a href="#">Mis redes sociales</a>
@endsection