<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProjetoVisita
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $disciplina_id
 * @property string $turma
 * @property int $num_alunos
 * @property string $destino
 * @property string|null $endereco
 * @property string|null $site
 * @property string|null $fone
 * @property string $justificativa
 * @property string|null $objetivo
 * @property string|null $metodologia
 * @property string|null $razao_social
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Cronograma[] $cronogramas
 * @property-read \App\Model\Disciplina $disciplina
 * @property-read \App\Model\RequerimentoVisita $requerimento
 * @property-read \App\Model\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereDestino($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereDisciplinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereFone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereJustificativa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereMetodologia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereNumAlunos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereObjetivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereRazaoSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjetoVisita whereUsuarioId($value)
 * @mixin \Eloquent
 */
class ProjetoVisita extends Model
{
    protected $table = 'projetos_visita';

    protected $fillable = ['codigo', 'usuario_id','disciplina_id','turma','num_alunos','destino','endereco','site','fone','justificativa','objetivo','metodologia','razao_social','status'];

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

    /**
     * Gera o codigo da visita
     * @return int
     */
    public static function generateCode()
    {
        do{
            $code = rand(1, 99999);
            $p = ProjetoVisita::where('codigo','=',$code)->count();
        }while($p != 0);

        return $code;
    }
}
