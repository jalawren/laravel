<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_types', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('description', 50)->nullable();


            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('file_type_id')->unsigned();
            $table->string('file_name', 50)->unique();
            $table->string('file_extension', 10);
            $table->string('model', 50)->nullable();
            $table->integer('schedule');
            $table->string('description')->nullable();

            $table->timestamps();

            $table->foreign('file_type_id')->references('id')->on('file_types')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
        Schema::drop('file_types');
    }
}
