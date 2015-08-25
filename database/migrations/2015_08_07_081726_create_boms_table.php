<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boms', function (Blueprint $table) {

            $table->integer('material')->unsigned();
            $table->string('item_number', 5);
            $table->integer('component')->unsigned();
            $table->double('component_quantity', 8, 3);
            $table->string('component_unit_of_measure', 4);

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
        Schema::drop('boms');
    }
}
