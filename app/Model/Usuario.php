<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['nome','login','password','email','cargo','status'];

    public function projetos()
    {
        return $this->hasMany(ProjetoVisita::class,'usuario_id','id');
    }
}
