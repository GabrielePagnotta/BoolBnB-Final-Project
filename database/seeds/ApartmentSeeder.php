<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Casa vista mare',
            3,
            1,
            1,
            40.71226,
            -74.00207,
            60,
            50,
            true,
            'ciao',
            'Via Giacomo 12'
        ];

        foreach($datas as $data){
            $newData = new Data();
            $newData->title=$data['title'];
            $newData->rooms=$data['rooms'];
            $newData->bedrooms=$data['bedrooms'];
            $newData->bathrooms=$data['bathrooms'];
            $newData->latitude=$data['latitude'];
            $newData->longitude=$data['longitude'];
            $newData->square_meters=$data['square_meters'];
            $newData->price=$data['price'];
            $newData->visibility=$data['visibility'];
            $newData->image=$data['image'];
            $newData->address=$data['address'];
            $newData->save();
        }
    }
}
