<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->integer('customer')->unsigned();
            $table->string('name_1', 100);
            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('region');
            $table->string('postal_code', 10);
            $table->string('country', 5);
            $table->timestamps();


            $table->primary('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
