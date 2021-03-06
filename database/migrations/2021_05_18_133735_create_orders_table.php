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

            $table->double('ordering_quantity')->nullable();
            $table->date('order_date')->nullable();

            $table->boolean('is_packed')->nullable();
            $table->double('packing_quantity')->nullable();
            $table->date('packed_date')->nullable();


            $table->boolean('is_shipped')->nullable();
            $table->double('shipping_quantity')->nullable();
            $table->date('shipped_date')->nullable();

            $table->boolean('is_done')->nullable();
            $table->boolean('is_available')->nullable();

            $table->double('price')->nullable();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
