<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAprovedLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aproved_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calif')->default(-1);
            $table->string('calif_especial')->default('-1');

            $table->integer('alumno_grupo_id')->unsigned();

            $table->foreign('alumno_grupo_id')->references('id')->on('group_students')->onDelete('cascade');

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
        Schema::dropIfExists('aproved_levels');
    }
}
