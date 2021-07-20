<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->string('title');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('people');
            $table->text('comments');
            $table->timestamp('incidentDate')->useCurrent();
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('modifyDate')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}