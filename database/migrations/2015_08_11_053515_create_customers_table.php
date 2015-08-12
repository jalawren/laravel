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

            $table->integer('id')->unsigned();
            $table->string('name', 100);
            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('region');
            $table->string('postal_code', 10);
            $table->string('country', 5);
            $table->timestamps();


            $table->primary('id');
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
