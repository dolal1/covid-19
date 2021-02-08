<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use App\Models\Healthworker;

class HealthworkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $value) {
            Healthworker::create([
            'name'  => $faker->name,
            'username'  => $faker->unique()->userName,
            'hospital_id'=> $faker->numberBetween($min = 1, $max = 5),
        ]);
        }
    }
}
