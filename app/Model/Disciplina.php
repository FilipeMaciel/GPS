<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected $fillable = [
        'nome',
        'curso_id'
    ];

    public function curso()
    {
        return $this->hasOne(Curso::class,'id','curso_id');
    }

    public function projetos()
    {
        return $this->hasMany(ProjetoVisita::class, 'disciplina_id','id');
    }
}
