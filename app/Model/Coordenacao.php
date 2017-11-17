<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coordenacao extends Model
{
    protected $table = 'coordenacoes';

    protected $fillable = ['nome','status'];

    public function requerimentos()
    {
        return $this->hasMany(RequerimentoVisita::class,'coordenacao_id','id');
    }
}
