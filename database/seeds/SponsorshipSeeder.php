<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            'name'->'Pacchetto Gold',
            'duration'->144,
            'price'->9.99,

        ]
    }
}
