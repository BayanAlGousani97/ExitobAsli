<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->enum('measruing_unit',['METER','KILOGRAM','GRAM'])->nullable();
            $table->string('grammage')->nullable();
            $table->double('quantity')->nullable();

            $table->bigInteger('raw_material_warehouse_id')->unsigned();
            $table->foreign('raw_material_warehouse_id')->references('id')->on('raw_material_warehouses')->onDelete('cascade');

            $table->bigInteger('i_o_bill_id')->unsigned();
            $table->foreign('i_o_bill_id')->references('id')->on('i_o_bills')->onDelete('cascade');
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
        Schema::dropIfExists('raw_materials');
    }
}
