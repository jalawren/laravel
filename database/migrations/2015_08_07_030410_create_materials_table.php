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
            $table->integer('id')->unsigned();
            $table->string('description', 40);
            $table->string('material_type', 4);
            $table->string('emg', 30);
            $table->float('cost', 8,2)->default(0.00);
            $table->integer('per')->default(1);
            $table->string('uom', 5)->default('KG');
            $table->longtext('notes')->nullable();
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
        Schema::drop('materials');
    }
}
