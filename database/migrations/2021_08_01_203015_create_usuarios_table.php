<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration{
    public function up(){
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 30);
            $table->char('tipoc', 9);
            $table->char('email', 30);
            $table->char('password', 32);
            $table->char('token', 6)->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('usuarios');
    }
}
