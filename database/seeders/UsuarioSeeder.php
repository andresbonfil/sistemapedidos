<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado personalmente

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre'=>'Andres Bonfil Tapia',
            'tipoc'=>'Comprador',
            'email'=>'andresbonfil@gmail.com',
            'password'=>'21232f297a57a5a743894a0e4a801fc3',
            'token'=>'123456'
        ]);
    }
}
