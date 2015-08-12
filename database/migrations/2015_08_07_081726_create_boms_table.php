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

            $table->string('bom_usage', 1)->default(5);
            $table->integer('material_id')->unsigned();
            $table->string('item_number', 5);
            $table->integer('component_id')->unsigned();
            $table->double('component_quantity', 8, 3);
            $table->string('component_unit', 4);

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
