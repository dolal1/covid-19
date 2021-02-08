<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Patient;
use App\Models\Healthworker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $value) {
            Patient::create([
            'name'  => $faker->name,
            'date' => $faker->dateTime($max = 'now', $timezone = null), // DateTime('2008-04-25 08:37:17', 'UTC'),
            'asymptomatic' => $faker->numberBetween($min = 1, $max = 2),
            'gender' => $faker->randomElement($array = array ('F','M')),
            'healthWorker_id' => $faker->numberBetween($min = 1, $max = 20),
        ]);
        }

        $healthWorkers = Healthworker::all();
        foreach ($healthWorkers as $healthWorker) {
            $patientCount = Patient::where('healthWorker_id', $healthWorker->id)->count();
            $healthWorker->patientNo = $patientCount;
            $healthWorker->save();
        }
    }
}
