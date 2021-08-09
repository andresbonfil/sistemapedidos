<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class testEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "ESTO ES UNA PRUEBA...";
    protected $datos;
    public function __construct($data){
        $this->datos = $data;
    }

    public function build(){
        return $this->view('emails.testEmail')->with(["datos"=>$this->datos]);
    }
}
