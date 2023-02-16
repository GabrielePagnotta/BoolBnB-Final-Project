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
        $sponsor=config('sponsoship-plan');

        foreach ($sponsor as $elem) {
            $newsponsorship= new Sponsorship();
            $newsponsorship->name=$elem['name'];
            $newsponsorship->duration=$elem['duration'];
            $newsponsorship->price=$elem['price'];
            $newsponsorship->save();

        }
    }
}
