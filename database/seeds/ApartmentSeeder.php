<?php


use Illuminate\Database\Seeder;

use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_apartments = config('apartments');

        foreach ($array_apartments as $elem) {
            $new_data = new Apartment();
            $new_data->title = $elem['title'];
            $new_data->rooms = $elem['rooms'];
            $new_data->bedrooms = $elem['bedrooms'];
            $new_data->bathrooms = $elem['bathrooms'];
            $new_data->latitude = $elem['latitude'];
            $new_data->longitude = $elem['longitude'];
            $new_data->description = $elem['description'];
            $new_data->square_meters = $elem['square_meters'];
            $new_data->price = $elem['price'];
            $new_data->visibility = $elem['visibility'];
            $new_data->cover = $elem['cover'];
            $new_data->address = $elem['address'];
            $new_data->save();
        }
    }
}
