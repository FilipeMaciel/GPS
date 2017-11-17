<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequerimentoVisita extends Model
{
    protected $table = 'requerimentos_visita';

    protected $fillable = ['projeto_id','coordenacao','campus','telefone','local','percurso','quilometragem','chegada','saida','motivacao','observacao','status'];

    protected $dates = ['chegada','saida'];

    public function projeto()
    {
        return $this->belongsTo(ProjetoVisita::class,'projeto_id','id');
    }

    public function campus()
    {
        return $this->hasOne(Campus::class,'id','campus_id');
    }
}
