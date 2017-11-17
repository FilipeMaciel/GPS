<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
