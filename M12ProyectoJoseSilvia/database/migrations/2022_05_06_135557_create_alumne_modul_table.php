<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumne_modul', function (Blueprint $table) {
            $table->id();
            $table->integer('nota_media');
            $table->string('comentario');
            $table->string('modificat_per');
            $table->foreignId('alumne_id')->constrained();
            $table->foreignId('modul_id')->constrained();
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
        Schema::dropIfExists('alumne_modul');
    }
};
