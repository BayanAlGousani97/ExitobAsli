<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->dateTime('purchase_date')->nullable();
            $table->double('quantity')->nullable();
            $table->double('single_cost')->nullable();
            $table->double('total_cost')->nullable();

            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('models_warehouse_id')->unsigned();
            $table->foreign('models_warehouse_id')->references('id')->on('models_warehouses')->onDelete('cascade'); 
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
        Schema::dropIfExists('external_models');
    }
}
