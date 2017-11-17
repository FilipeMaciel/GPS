<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = ['nome','login','senha','cargo','status'];

    public function projetos()
    {
        return $this->hasMany(ProjetoVisita::class,'usuario_id','id');
    }
}
