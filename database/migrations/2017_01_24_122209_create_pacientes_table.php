<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('nuhsa');
            $table->unsignedInteger('enfermedad_id');
            $table->unsignedInteger('especialidad_id');

            $table->timestamps();

            $table->foreign('enfermedad_id')->references('id')->on('enfermedads');
            $table->foreign('especialidad_id')->references('id')->on('especialidads');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacientes');

    }
}
