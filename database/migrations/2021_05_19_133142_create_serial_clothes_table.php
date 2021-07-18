<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_clothes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('pieces_count')->nullable();
            $table->bigInteger('company_model_id')->unsigned();
            $table->foreign('company_model_id')->references('id')->on('company_models')->onDelete('cascade');
            $table->bigInteger('external_model_id')->unsigned();
            $table->foreign('external_model_id')->references('id')->on('external_models')->onDelete('cascade');
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
        Schema::dropIfExists('serial_clothes');
    }
}
