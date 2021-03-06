<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->text('description')->nullable();
            $table->double('quantity')->nullable();
            $table->double('recorded_quantity')->nullable();
            $table->enum('discount_type',['PERCENT','MONEY'])->nullable();
            $table->double('discount_value')->nullable();
            $table->double('single_cost')->nullable();
            $table->double('total_cost')->nullable();
            $table->double('net_cost')->nullable(); // Amount To Pay
            $table->double('pending_amount')->nullable();
            $table->double('payment_amount')->nullable();
            $table->double('tax')->nullable(); // "Dreba" Hhhhh >_<
            $table->double('Customs_fees')->nullable(); // "jamrok" Hahaha 
            $table->double('other_wages')->nullable();

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->bigInteger('haulage_company_id')->unsigned();
            $table->foreign('haulage_company_id')->references('id')->on('haulage_companies')->onDelete('cascade');

            $table->bigInteger('message_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            
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
        Schema::dropIfExists('bills');
    }
}
