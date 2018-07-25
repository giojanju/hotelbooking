<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 10,2)->nullable();
            $table->timestamps();
        });

        Schema::create('hotel_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('locale')->index();
            $table->foreign('hotel_id')->references('id')->on('hotels')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('hotel_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('hotel_service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_service_id')->unsigned();
            $table->string('locale')->index();
            $table->foreign('hotel_service_id')->references('id')->on('hotel_services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title')->nullable();
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
        Schema::dropIfExists('hotel_service_translations');
        Schema::dropIfExists('hotel_services');
        Schema::dropIfExists('hotel_translations');
        Schema::dropIfExists('hotels');
    }
}
