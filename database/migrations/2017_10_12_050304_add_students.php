<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('numero_control');
            $table->integer('generacion_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->integer('promedio')->default(0);
            $table->boolean('constancia_expedida')->default(false);


            $table->foreign('generacion_id')->references('id')->on('generations')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('careers')->onDelete('cascade');

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
        Schema::dropIfExists('students');

    }
}
