<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Curso
 *
 * @property int $id
 * @property string $nome
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Disciplina[] $disciplinas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Curso whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Curso whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Curso whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['nome'];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class,'curso_id','id');
    }
}
