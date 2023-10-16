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
        Schema::create('filtro_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->dateTime('entrada1')->nullable();
            $table->dateTime('saida1')->nullable();
            $table->dateTime('entrada2')->nullable();
            $table->dateTime('saida2')->nullable();
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
        Schema::dropIfExists('filtro_drivers');
    }
};
