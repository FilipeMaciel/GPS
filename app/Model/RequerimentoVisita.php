<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\RequerimentoVisita
 *
 * @property int $id
 * @property int $projeto_id
 * @property int $coordenacao_id
 * @property int $campus_id
 * @property string|null $fone
 * @property string $local
 * @property string $percurso
 * @property int $quilometragem
 * @property \Carbon\Carbon $chegada
 * @property \Carbon\Carbon $saida
 * @property string $motivacao
 * @property string|null $observacao
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\Campus $campus
 * @property-read \App\Model\Coordenacao $coordenacao
 * @property-read \App\Model\ProjetoVisita $projeto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereCampusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereChegada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereCoordenacaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereFone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereMotivacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita wherePercurso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereProjetoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereQuilometragem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereSaida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RequerimentoVisita whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function coordenacao()
    {
        return $this->hasOne(Coordenacao::class,'id','coordenacao_id');
    }
}
