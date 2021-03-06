<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frameworks', function (Blueprint $table) {
            $table->id();
            $table->double('number')->nullable();
            $table->string('name')->nullable();
            $table->date('publish_datetime')->nullable();
            $table->double('fabric_quantities')->nullable();
            $table->double('weight')->nullable();
            $table->string('worker_name')->nullable();
            $table->double('framework_quantity')->nullable();
            $table->double('needed_quantity')->nullable();
            
            $table->bigInteger('company_model_id')->unsigned();
            $table->foreign('company_model_id')->references('id')->on('company_models')->onDelete('cascade');
         
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
        Schema::dropIfExists('frameworks');
    }
}
