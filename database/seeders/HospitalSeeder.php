<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Hospital;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $value) {
            Hospital::create([
                'name'  => "$faker->company Hospital",
                'district_id'=> $faker->numberBetween($min = 1, $max = 3),
            ]);
        }
    }
}
