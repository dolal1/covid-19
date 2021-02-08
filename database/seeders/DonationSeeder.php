<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Donor;
use App\Models\Treasury;

class DonationSeeder extends Seeder
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
            Donor::create([
                'name'  => $faker->company,
                'amount' => ($faker->numberBetween($min = 50, $max = 200))*1000000,
            ]);
        }

        $totalDonations = Donor::sum('amount');
        $excess = $totalDonations - 100000000;

        $treasury = Treasury::find(1);
        $treasury->amount = $totalDonations;
        if($excess < 1 ) {
            $treasury->excess = 0;
        } else {
            $treasury->excess = $excess;
        }
        $treasury->save();
    }
}
