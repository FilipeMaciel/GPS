<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['nome'];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class,'curso_id','id');
    }
}
