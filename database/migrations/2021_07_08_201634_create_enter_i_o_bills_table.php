<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterIOBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enter_i_o_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('iobill_id');

            $table->string('name');
            $table->string('color');
            $table->float('price');
            $table->integer('quantity');
            $table->float('net_cost')->storedAs('price*quantity');

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
        Schema::dropIfExists('enter_i_o_bills');
    }
}
