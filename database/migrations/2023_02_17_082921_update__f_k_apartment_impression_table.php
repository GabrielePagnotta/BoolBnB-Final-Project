<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFKApartmentImpressionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('impressions', function (Blueprint $table) {
            $table->unsignedBigInteger('apartmentId')->nullable();
            $table->foreign('apartmentId')->references('id')->on('apartments')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('impressions', function (Blueprint $table) {
            $table->dropForeign('impressions_apartmentid_foreign');
            $table->dropColumn('apartmentId');
        });
    }
}
