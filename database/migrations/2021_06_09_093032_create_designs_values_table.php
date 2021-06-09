<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_values', function (Blueprint $table) {

            $table->bigInteger('design_id')->unsigned()->nullable();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');

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
        Schema::dropIfExists('designs_values');
    }
}
