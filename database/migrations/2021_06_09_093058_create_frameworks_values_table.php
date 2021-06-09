<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworksValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frameworks_values', function (Blueprint $table) {

            $table->bigInteger('framework_id')->unsigned()->nullable();
            $table->foreign('framework_id')->references('id')->on('frameworks')->onDelete('cascade');

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
        Schema::dropIfExists('frameworks_values');
    }
}
