<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_prices', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->float('price', 8,2)->default(0.00);
            $table->integer('price_unit')->default(1);
            $table->string('unit_of_measure', 5)->default('LB');
            $table->float('scale', 8, 3)->default(0);
            $table->string('material_group', 50)->nullable();

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
        Schema::drop('customer_prices');
    }
}
