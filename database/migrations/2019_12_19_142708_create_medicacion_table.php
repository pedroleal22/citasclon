<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tratamiento_id');
            $table->unsignedInteger('medicina_id');
            $table->integer('unidades');
            $table->string('frecuencia');
            $table->string('instrucciones');

            $table->timestamps();

            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');
            $table->foreign('medicina_id')->references('id')->on('medicinas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicacions');

    }
}
