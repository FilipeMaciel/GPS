<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->integer('id',true);
            $table->text('atividade');
            $table->dateTime('data');
            $table->integer('projeto_id')->index('projeto_id');
            $table->timestamps();
        });

        Schema::table('cronogramas', function(Blueprint $table)
        {
            $table->foreign('projeto_id', 'cronogramas_ibfk_1')->references('id')->on('projetos_visita')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cronogramas');
    }
}
