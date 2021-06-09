<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_lines', function (Blueprint $table) {
           
            $table->integer('priority')->default('0');
            $table->string('location')->nullable();
            $table->integer('stages_count')->default('1');
            $table->bigInteger('workshop_id')->unsigned()->nullable();
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade');

            $table->bigInteger('framework_id')->unsigned()->nullable();
            $table->foreign('framework_id')->references('id')->on('frameworks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_lines');
    }
}
