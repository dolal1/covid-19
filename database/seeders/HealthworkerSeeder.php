<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Healthworker;
use App\Models\Hospital;

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
        foreach (range(1, 25) as $value) {
            Healthworker::create([
            'name'  => $faker->name,
            'username'  => $faker->unique()->userName,
            'hospital_id'=> $faker->numberBetween($min = 1, $max = 10),
        ]);
        }

        $hospitals = Hospital::all();
        foreach ($hospitals as $hospital) {
            $healthworkerCount = Healthworker::where('hospital_id', $hospital->id)->count();
            $hospital->workersNo = $healthworkerCount;
            $hospital->save();
        }
    }
}
