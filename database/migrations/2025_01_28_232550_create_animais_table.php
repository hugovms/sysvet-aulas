<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animais', function (Blueprint $table): void {
            $table->id();
            $table->string('imagem');
            $table->string('nome');
            $table->string('tipo_animal');
            $table->string('raca');
            $table->integer('idade');
            $table->float('peso'); //5.05
            $table->string('descricao');
            $table->integer('dono_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animais');
    }
}
