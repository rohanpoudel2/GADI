<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->text('image')->nullable();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('type');
            $table->string('model');
            $table->integer('year');
            $table->string('engine');
            $table->integer('power');
            $table->integer('topspeed')->nullable();
            $table->string('interior');
            $table->string('transmission');
            $table->text('description');
            $table->float('price');
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};