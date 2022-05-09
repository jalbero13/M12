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
        Schema::create('alumnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('cognoms');
            $table->string('direccio');
            $table->date('data_naixement');
            $table->string('dni', 9);
            $table->string('telefon', 9);
            $table->string('mail');
            $table->string('modificat_per');
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
        Schema::dropIfExists('alumnes');
    }
};
