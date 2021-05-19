<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['ORDERED','SHIPPED','PACKED'])->nullable();
            $table->dateTime('order_date')->nullable();
            $table->dateTime('shipped_date')->nullable();
            $table->dateTime('packed_date')->nullable();

            $table->double('ordering_quantity')->nullable();
            $table->double('shipping_quantity')->nullable();
            $table->double('packing_quantity')->nullable();

            $table->double('price')->nullable();

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}