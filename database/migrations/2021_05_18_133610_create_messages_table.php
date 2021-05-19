<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->dateTime('sending_date')->nullable();
            $table->dateTime('recieving_date')->nullable();
            $table->double('sent_quantity')->nullable();
            $table->double('recieved_quantity')->nullable();

            $table->bigInteger('sent_id')->unsigned();
            $table->foreign('sent_id')->references('id')->on('workshops')->onDelete('cascade');
            $table->bigInteger('recieved_id')->unsigned();
            $table->foreign('recieved_id')->references('id')->on('workshops')->onDelete('cascade');

            $table->bigInteger('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
            $table->bigInteger('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->bigInteger('framework_id')->unsigned();
            $table->foreign('framework_id')->references('id')->on('frameworks')->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
