<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Coordenacao
 *
 * @property int $id
 * @property string $nome
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\RequerimentoVisita[] $requerimentos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Coordenacao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Coordenacao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Coordenacao whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Coordenacao whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Coordenacao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Coordenacao extends Model
{
    protected $table = 'coordenacoes';

    protected $fillable = ['nome','status'];

    public function requerimentos()
    {
        return $this->hasMany(RequerimentoVisita::class,'coordenacao_id','id');
    }
}
