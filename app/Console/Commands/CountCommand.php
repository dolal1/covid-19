<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Healthworker;
use App\Models\Hospital;
use App\Models\District;

class CountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Counts the number of patients and healthworkers associated to hospitals and districts';

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
        $hospitals = Hospital::all();
        foreach ($hospitals as $hospital) {
            $healthworkerCount = Healthworker::where('hospital_id', $hospital->id)->count();
            $hospital->workersNo = $healthworkerCount;
            $hospital->save();
        }
        echo "\nWorker Count Per Hospital Operation Done.";

        $hospitals = Hospital::all();
        foreach ($hospitals as $hospital) {
            $patientNo = Healthworker::where('hospital_id', $hospital->id)->sum('patientNo');
            $hospital->patientNo = $patientNo;
            $hospital->save();
        }
        echo "\nPatient Sum Per Hospital Operation Done.";

        $districts = District::all();
        foreach ($districts as $district) {
            $patientNo = Hospital::where('district_id', $district->id)->sum('patientNo');
            $district->patientNo = $patientNo;
            $district->save();
        }
        echo "\nPatient Sum Per District Operation Done.";

        $districts = District::all();
        foreach ($districts as $district) {
            $workersNo = Hospital::where('district_id', $district->id)->sum('workersNo');
            $district->workerNo = $workersNo;
            $district->save();
        }
        echo "\nPatient Sum Per District Operation Done.";
    }
}
