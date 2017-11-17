<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentosVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimentos_visita', function (Blueprint $table) {
            $table->integer('id',true);
            $table->integer('projeto_id')->index('projeto_id');
            $table->integer('coordenacao_id')->index('coordenacao_id');
            $table->integer('campus_id')->index('campus_id');
            $table->string('fone',30)->nullable();
            $table->string('local',250);
            $table->string('percurso',250);
            $table->integer('quilometragem')->default(1);
            $table->dateTime('chegada');
            $table->dateTime('saida');
            $table->text('motivacao');
            $table->text('observacao')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('requerimentos_visita', function(Blueprint $table)
        {
            $table->foreign('projeto_id', 'requerimentos_visita_ibfk_1')->references('id')->on('projetos_visita')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('campus_id', 'requerimentos_visita_ibfk_2')->references('id')->on('campus')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('coordenacao_id', 'requerimentos_visita_ibfk_3')->references('id')->on('coordenacoes')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerimentos_visita');
    }
}
