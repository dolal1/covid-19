<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Healthworker;
use App\Models\Hospital;

class HeadOfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = 1;
        foreach (range(1, 10) as $value) {
            $healthworker = Healthworker::where('hospital_id', '=', "$index")->first();
            $id = $healthworker->id;
            Hospital::where('id', '=' ,$index)->update([
                'headofficer_id' => $id
            ]);
            ++$index;
        }
    }
}
