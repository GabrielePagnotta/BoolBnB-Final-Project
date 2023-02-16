<?php

use App\Models\Apartment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('rooms');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->smallInteger('square_meters');
            $table->smallInteger('price');
            $table->boolean('visibility');
            $table->string('image')->nullable();
            $table->string('address');
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
        Schema::dropIfExists('apartments');
    }
}
