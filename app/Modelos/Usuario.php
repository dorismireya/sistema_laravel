<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Usuario extends User
{

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $fillable = [
    	'name', 'email', 'password', 'tipo', 'estado'
    	];

	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
    	if($value !== null)
    		$this->attributes['password'] = bcrypt($value);
    }
    
    public function getNombreCompletoAttribute()
    {
        return $this->attributes['name'];
    }

    public function usuarioTarea(){
        return $this->hasMany('App\Modelos\UsuarioTarea', 'id_usuario', 'id');
    }


}
    