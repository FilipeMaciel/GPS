<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos_visita', function (Blueprint $table) {
            $table->integer('id',true);
            $table->integer('usuario_id')->index('usuario_id');
            $table->integer('disciplina_id')->index('disciplina_id');
            $table->string('turma',250);
            $table->integer('num_alunos');
            $table->string('destino',250);
            $table->string('endereco',250)->nullable();
            $table->string('site',250)->nullable();
            $table->string('fone',30)->nullable();
            $table->text('justificativa');
            $table->text('objetivo')->nullable();
            $table->text('metodologia')->nullable();
            $table->string('razao_social',250)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });


        Schema::table('projetos_visita', function(Blueprint $table)
        {
            $table->foreign('usuario_id', 'projetos_visita_ibfk_1')->references('id')->on('usuarios')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('disciplina_id', 'projetos_visita_ibfk_2')->references('id')->on('disciplinas')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos_visita');
    }
}
