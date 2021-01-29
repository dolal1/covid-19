<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthWorker;

class HealthWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthWorker::create([
            'name'  => 'Collin Doki',
            'username'  => 'collindoki',
            'hospital_id'=> 1,
        ]);
    }
}
