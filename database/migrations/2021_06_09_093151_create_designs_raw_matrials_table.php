<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsRawMatrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_raw_matrials', function (Blueprint $table) {

            $table->bigInteger('design_id')->unsigned()->nullable();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');

            $table->bigInteger('raw_material_id')->unsigned()->nullable();
            $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designs_raw_matrials');
    }
}
