<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = ['nome','status'];

    public function requerimentos()
    {
        return $this->hasMany(RequerimentoVisita::class,'campus_id','id');
    }
}
