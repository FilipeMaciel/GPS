<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Cronograma
 *
 * @property int $id
 * @property string $atividade
 * @property \Carbon\Carbon $data
 * @property int $projeto_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\ProjetoVisita $projeto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereAtividade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereProjetoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Cronograma whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cronograma extends Model
{
    protected $table = 'cronogramas';

    protected $fillable = ['atividade','data','projeto_id'];

    protected $dates = ['data'];

    public function projeto()
    {
        return $this->belongsTo(ProjetoVisita::class,'projeto_id','id');
    }
}
