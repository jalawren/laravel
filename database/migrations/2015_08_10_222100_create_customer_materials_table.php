<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_materials', function (Blueprint $table) {

            $table->integer('customer')->unsigned();
            $table->integer('material')->unsigned();
            $table->string('customer_material_number')->nullable();
            $table->string('customers_description_of_material')->nullable();

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
        Schema::drop('customer_materials');
    }
}
