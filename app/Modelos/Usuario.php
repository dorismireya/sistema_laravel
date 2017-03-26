<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Usuario extends User
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    public $fillable = [
    	'nombres', 'apellidos', 'email', 'username', 'password', 'tipo', 'estado'
    	];

    public function setPasswordAttribute($value)
    {
    	if($value !== null)
    		$this->attributes['password'] = bcrypt($value);
    }
    
    public function getNombreCompletoAttribute()
    {
        return $this->attributes['nombres'] . ' ' .
            $this->attributes['apellidos'];
    }

    public function usuarioTarea(){
        return $this->hasMany('App\Modelos\UsuarioTarea', 'id_usuario', 'id_usuario');
    }


    public function prueba(){

        $pruebas = BD::table('usuarios')->get();
        echo $pruebas;
    }
}
    