<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_models', function (Blueprint $table) {
            $table->id();
            $table->double('number')->nullable();
            $table->string('name')->nullable();
            $table->date('publish_datetime')->nullable();
            $table->double('pieces_count')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
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
        Schema::dropIfExists('models');
    }
}
