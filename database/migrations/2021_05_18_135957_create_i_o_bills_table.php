<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIOBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_o_bills', function (Blueprint $table) {
            $table->id();
            $table->double('number')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->double('quantity')->nullable();
            $table->enum('discount_type',['PERCENT','MONEY'])->nullable();
            $table->double('discount')->nullable();
            $table->double('single_cost')->nullable();
            $table->double('total_cost')->nullable();
            $table->double('net_cost')->nullable(); // Amount To Pay
            $table->double('pending_amount')->nullable();
            $table->double('payment_amount')->nullable();

            $table->bigInteger('exporter_id')->unsigned();
            $table->foreign('exporter_id')->references('id')->on('exporters')->onDelete('cascade');
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
        Schema::dropIfExists('i_o_bills');
    }
}
