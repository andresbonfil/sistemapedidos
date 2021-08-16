<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration{
    public function up(){
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');//30
            $table->string('tipoc');//9
            $table->string('email');//30
            $table->char('password', 32);//FIJO POR MD5
            $table->char('token', 6)->nullable();//FIJO POR CODERAND
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('usuarios');
    }
}
