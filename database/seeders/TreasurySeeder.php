<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treasury;

class TreasurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Treasury::create([
            'amount'  => 0,
            'excess'=> 0
        ]);
    }
}
