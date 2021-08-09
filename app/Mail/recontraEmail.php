<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class recontraEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Recuperación de contraseña Cotizaciones Bonfil";
    protected $datos;
    public function __construct($data){
        $this->datos = $data;
    }
    public function build(){
        return $this->view('emails.recontraEmail')->with(["datos"=>$this->datos]);
    }
}
