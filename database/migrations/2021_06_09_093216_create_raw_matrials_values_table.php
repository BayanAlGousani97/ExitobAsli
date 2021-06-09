<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMatrialsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_matrials_values', function (Blueprint $table) {

            $table->bigInteger('raw_material_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');

            $table->bigInteger('value_id')->unsigned()->nullable();
            $table->foreign('value_id')->references('id')->on('option_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raw_matrials_values');
    }
}
