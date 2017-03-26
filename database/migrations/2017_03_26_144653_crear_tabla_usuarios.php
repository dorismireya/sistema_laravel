<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id_usuario');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->enum('tipo', [
                'adm',
                'pub',
                'lec',
                ])->nullable();
            $table->string('estado');
            $table->timestamps();
            $table->rememberToken();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
