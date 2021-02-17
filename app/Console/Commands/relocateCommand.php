<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Healthworker;
use App\Models\Hospital;

class relocateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:relocate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relocates Senior Health Officers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $allHospitals = Hospital::orderBy('seniorWorkerNo')->get();
        $allHealthworkers = Healthworker::all();

        $index = 0;
        $i=0;

        foreach ($allHealthworkers as $healthworker) {
            if ($healthworker->status == 'senior') {
                echo "$healthworker->name in hospital $healthworker->hospital_id\n";

                // $firstHospital = Hospital::orderBy('seniorWorkerNo')->first();
                // $firstHospitalSeniorNumber = $firstHospital->seniorWorkerNo;
                // if (condition) {
                //     # code...
                // }
            }
        }
                echo "\n";

        foreach ($allHospitals as $hospital) {
                echo "$hospital->name in has $hospital->seniorWorkerNo seniors\n";
            }
        

        // foreach ($allHospitals as $hospital) {
        //     echo "$i";
        //     $index += $hospital->seniorWorkerNo;
        //     if($i>=1) break;
        //     $i++;
        // }
        // echo "\n";
        // $index = $index/2;

        // if ($index !== $firstHospitalSeniorNumber || $index == 0) {
        //     # code...
        //     echo "$index";
        //     echo 'Haaaa';
        // } else {
        //     echo 'Yoo';
        // }
    }
}
