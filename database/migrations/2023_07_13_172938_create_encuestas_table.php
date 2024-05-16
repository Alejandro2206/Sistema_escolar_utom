<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('puntuacion');
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
}
