<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjetoVisita extends Model
{
    protected $table = 'projetos_visita';

    protected $fillable = ['usuario_id','disciplina_id','turma','num_alunos','destino','endereco','site','fone','justificativa','objetivo','metodologia','razao_social','status'];

    public function cronogramas()
    {
        return $this->hasMany(Cronograma::class,'projeto_id','id');
    }

    public function disciplina()
    {
        return $this->hasOne(Disciplina::class,'id','disciplina_id');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class,'id','usuario_id');
    }

    public function requerimento()
    {
        return $this->hasOne(RequerimentoVisita::class,'projeto_id','id');
    }
}
