<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function(Blueprint $table)
        {
            $table->integer('material')->unsigned();
            $table->string('mtyp', 4);
            $table->string('material_description', 40);
            $table->string('ext_material_grp', 30);
            $table->float('standard_price', 8,2)->default(0.00);

            $table->timestamps();

            $table->primary('material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('materials');
    }
}
