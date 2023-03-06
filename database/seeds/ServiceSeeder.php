<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'piscina',
            'wifi',
            'sauna',
            'palestra',
            'climatizzatore',
            'animali',
            'tv',
            'colazione'
        ];

        foreach($services as $service){
            $newService = new Service();
            $newService->typeOfService = $service;
            $newService->save();
        }
    }
}
