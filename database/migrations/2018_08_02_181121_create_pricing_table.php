<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 10,2);
            $table->timestamps();
        });

        Schema::create('pricing_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pricing_id')->unsigned();
            $table->string('locale')->index();
            $table->foreign('pricing_id')->references('id')->on('pricings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing_translations');
        Schema::dropIfExists('pricing');
    }
}
