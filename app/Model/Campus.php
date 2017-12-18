<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Campus
 *
 * @property int $id
 * @property string $nome
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\RequerimentoVisita[] $requerimentos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Campus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Campus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Campus whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Campus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Campus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = ['nome','status'];

    public function requerimentos()
    {
        return $this->hasMany(RequerimentoVisita::class,'campus_id','id');
    }
}
