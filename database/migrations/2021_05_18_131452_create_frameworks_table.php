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
            $table->dateTime('publish_datetime')->nullable();
            $table->double('fabric_quantities')->nullable();
            $table->double('weight')->nullable();
            $table->string('worker_name')->nullable();
            $table->double('framework_quantity')->nullable();
            $table->double('needed_quantity')->nullable();

            $table->bigInteger('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
            $table->bigInteger('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
