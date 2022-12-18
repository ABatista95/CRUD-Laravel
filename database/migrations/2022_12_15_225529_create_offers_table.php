<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('offer_id');

            $table->string('creator');
            $table->string('object');
            $table->bigInteger('activity_id')->unsigned();
            $table->text('description');
            $table->string('currency');
            $table->integer('budget');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('status');

            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('activity_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
