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
        Schema::create('alumne_uf', function (Blueprint $table) {
            $table->id();
            $table->integer('nota');
            $table->foreignId('alumne_id')->constrained()
                        ->cascadeOnUpdate()
                        ->cascadeOnDelete();
            $table->foreignId('uf_id')->constrained()
                        ->cascadeOnUpdate()
                        ->cascadeOnDelete();
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
        Schema::dropIfExists('alumne_uf');
    }
};
