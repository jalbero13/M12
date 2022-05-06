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
        Schema::create('alumnes_ufs', function (Blueprint $table) {
            $table->id();
            $table->integer('nota');
            $table->foreignId('alumne_id')->constrained();
            $table->foreignId('uf_id')->constrained();
            $table->string('modificat_per');
            //$table->string('comentari');
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
        Schema::dropIfExists('alumnes_ufs');
    }
};
