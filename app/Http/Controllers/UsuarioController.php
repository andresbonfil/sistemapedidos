<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Mail\testEmail;
use App\Mail\recontraEmail;
use Illuminate\Support\Facades\Mail;


class UsuarioController extends Controller{
    //ESTA ES LA FUNCION DE PRUEBA PARA VER LA LISTA DE USAURIOS EN FORMATO JSON
    //ESTE HACE UNA CONSULTA DE LOS ULTIMOS 5 (TAKE(5)) PARA NO GASTAR TANTO EN LA CONSULTA
    public function index(){ return Usuario::orderBy('id','desc')->take(5)->get(); }
    //ESTE ES SOLO UN EMAIL GENERICO MANDA UN MENSAJE GENERICO DENTRO DE UN EMAIL
    //SOLO PARA VER COMO FUNIONA EL MAKE:MAILER
    public function emailtest(){
        $data=['nombre'=>'andres', 'apellido'=>'bonfil', 'telefono'=>7355781754];
        $correo=new testEmail($data);
        Mail::to('andresbonfil@gmail.com')->send($correo);
        return 'Gracias por recibir correo';
    }
    //ESTA ES LA FUNCION QUE RECIBE LA SOLICITUD DE GUARDAR UN NUEVO USUARIO
    //CUANDO SE INTENTA CREAR UN NUEVO USUARIO VIENE Y PREGUNTA SI YA EXISTE
    //SI NO ENTONCES LO CREA RESPONDE APROBADO O RECHAZADO
    public function store(Request $request){
        if(Usuario::where('email','=',$request->txtEmail)->first()){ 
            return response()->json(['estatus'=>'Rechazado','info'=>$request->txtEmail], 400);
        }
        else{ 
            $usuario = new Usuario();
            $usuario->nombre = $request->txtNombre;
            $usuario->tipoc = $request->txtTipoc;
            $usuario->email = $request->txtEmail;
            $usuario->password = $request->txtPassword;
            $usuario->token='';
            $usuario->save();
            return response()->json(['estatus'=>'Aprobado','info'=>$request->txtEmail], 200);
        }
    }
    //ESTA ES LA FUNCION QUE MANDA INSTRUCCIONES PARA RECUPERAR TU CORREO
    //SI EL EMAIL EXISTE EN NUESTRA BD GENERA UN CODIGO TOKEN Y LO ANEXA AL EMAIL
    //DEL QUE SE ESTA HACIENDO LA SOLICITUD SI NO EXISTE DEVUELVE RECHAZADO
    //UTILIZA (recontraEmail.php) ARRIBA SE ANEXA Y SE INICIALIZA CON $data
    public function recontra(Request $request){
        if($usuario=Usuario::where('email','=',$request->txtEmail)->first()){            
            $coderand=rand(100000,999999);
            $usuario->token = $coderand;
            $usuario->save();
            $data=[
                'nombre'=>$usuario->nombre, 
                'email'=>$request->txtEmail, 
                'code'=>$coderand
            ];
            $correo=new recontraEmail($data);
            Mail::to($request->txtEmail)->send($correo);   
            return response()->json(['estatus'=>'Aprobado','info'=>$request->txtEmail], 200);
        }
        else{
            return response()->json(['estatus'=>'Rechazado','info'=>$request->txtEmail], 400);
        }
    }
    //ESTA FUNCION RECIBE LA PETICION DE CAMBIO DE CONTRASEÑA TIENE QUE VALIDAR EL CORREO SOLICITANTE
    //Y TIENE QUE VALIDAR QUE EL TOKEN SEA VALIDO Y TIENE QUE CAMBIARLO PARA QUE YA NO SE PUEDA REALIZAR
    //LA OPERACION NO SIN ANTES VOLVER A SOLICITUAR QUE LO ENVIEN A TU CORREO. COMO NO FORMA PARTE DEL
    //FRONTEND SOLO DEBE DAR MENSAJES DE ACEPTADO O RECHAZADO 
    public function emailRecoveryPost(Request $request){
        if($usuario=Usuario::where('email','=',$request->email)->first()){            
            if($usuario->token==$request->token){
            $usuario->password = md5($request->password);
            $usuario->token = $coderand=rand(100000,999999);
            $usuario->save();
            return '<h1> SOLICITUD ACEPTADA, TU NUEVO PASSWORD ES :<br>'.$request->password.'</h1>';
            }
            else{
                return response()->
                json(['estatus'=>'SOLICITUD RECHAZADA POR TOKEN INVALIDO :','info'=>$request->token], 400);
            }
        }
        else{
            return response()->json(['estatus'=>'SOLICITUD RECHAZADA POR CORREO INVALIDO','info'=>$request->email], 400);
        }
    }

    //public function create(){}
    //public function show(usuario $usuario){ }
    //public function edit(usuario $usuario){ }
    //public function update(Request $request, usuario $usuario){ }
    //public function destroy(usuario $usuario){ }
}
