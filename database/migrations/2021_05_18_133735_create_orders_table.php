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

<<<<<<< HEAD
>>>>>>> 72616b99c3a77d215317351453483e4faabff97b
            $table->double('ordering_quantity')->nullable();
            $table->boolean('packed')->nullable();
            $table->boolean('done')->nullable();
            $table->boolean('available')->nullable();
            $table->boolean('packed')->nullable();
            $table->double('packing_quantity')->nullable();
            $table->dateTime('packed_date')->nullable();
            $table->boolean('Haulage')->nullable(); 
            $table->double('shipping_quantity')->nullable();
            $table->dateTime('shipped_date')->nullable();
=======
            $table->boolean('is_shipped')->nullable(); 
            $table->double('shipping_quantity')->nullable(); 
            $table->date('shipped_date')->nullable();

            $table->boolean('is_done')->nullable(); 
            $table->boolean('is_available')->nullable(); 

>>>>>>> ceaafcc06894bbc99d2f7e46a2263e1e9f18202f
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
