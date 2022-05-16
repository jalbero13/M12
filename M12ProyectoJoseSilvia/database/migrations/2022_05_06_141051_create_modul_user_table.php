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
        Schema::create('modul_user', function (Blueprint $table) {
            $table->foreignId('modul_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('modificat_per');
            $table->timestamps();
            $table->primary(['modul_id','user_id']);
            $table->string('nom_modul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modul_user');
    }
};
