<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pin_usages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class');
            $table->integer('pin_id')->unsigned();
            $table->integer('visitor_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->string('date');
            $table->timestamps();

            $table->foreign('pin_id')->references('id')->on('pins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pin_usages');
    }
}
