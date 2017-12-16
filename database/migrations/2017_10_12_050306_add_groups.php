<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aula');
            $table->string('hora')->nullable();
            $table->string('tipo_curso');
            $table->boolean('estatus')->default(true);

            $table->integer('nivel_id')->unsigned();
            $table->integer('profesor_id')->unsigned();

            $table->foreign('nivel_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('teachers')->onDelete('cascade');

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
        Schema::dropIfExists('groups');
    }
}
