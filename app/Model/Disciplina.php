<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Disciplina
 *
 * @property int $id
 * @property string $nome
 * @property int $curso_id
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\Curso $curso
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ProjetoVisita[] $projetos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Disciplina whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
