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
            $table->bigInteger('rooms');
            $table->bigInteger('bedrooms');
            $table->bigInteger('bathrooms');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->bigInteger('square_meters');
            $table->bigInteger('price');
            $table->boolean('visibility')->nullable();
            $table->LongText('description');
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
