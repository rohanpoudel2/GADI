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
            $table->bigInteger('brand_id')->unsigned();
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('engine');
            $table->integer('power');
            $table->integer('topspeed')->nullable();
            $table->string('interior');
            $table->string('transmission');
            $table->text('description');
            $table->json('colors');
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands');
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