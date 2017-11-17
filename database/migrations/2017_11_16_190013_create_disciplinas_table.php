<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('nome',250);
            $table->integer('curso_id')->index('curso_id');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::table('disciplinas', function(Blueprint $table)
        {
            $table->foreign('curso_id', 'disciplinas_ibfk_1')->references('id')->on('cursos')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('disciplinas');
        Schema::enableForeignKeyConstraints();
    }
}
