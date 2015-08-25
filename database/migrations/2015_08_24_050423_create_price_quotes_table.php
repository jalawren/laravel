<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_quotes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('customer')->unsigned();
            $table->integer('material')->unsigned();
            $table->json('bom');
            $table->json('price_scale');
            $table->tinyInteger('revision')->default(1);
            $table->date('issue_date');
            $table->date('expiration_date');

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
        Schema::drop('price_quotes');
    }
}
