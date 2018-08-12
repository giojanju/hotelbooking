<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHotelService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_services', function (Blueprint $table) {
            $table->dropForeign('hotel_services_hotel_id_foreign');
            $table->dropColumn('hotel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_services', function (Blueprint $table) {
            $table->integer('hotel_id')->unsigned()->nullable()->after('id');
            $table->foreign('hotel_id')->references('id')->on('hotels')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }
}
