<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_orders', function (Blueprint $table) {

            $table->double('quantity')->default('0');

            $table->bigInteger('company_model_id')->unsigned();
            $table->foreign('company_model_id')->references('id')->on('company_models')->onDelete('cascade');

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');


        });

        Schema::create('external_models_orders', function (Blueprint $table) {

            $table->double('quantity')->default('0'); 

            $table->bigInteger('external_model_id')->unsigned();
            $table->foreign('external_model_id')->references('id')->on('external_models')->onDelete('cascade');

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_orders');
    }
}
