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
        $allHealthworkers = Healthworker::all();

        foreach ($allHealthworkers as $healthworker) {
            if ($healthworker->status == 'senior') {
                $hospital = Hospital::orderBy('seniorWorkerNo')->where('level', 'Regional')->first();

                if ($hospital->workersNo >= 10) {
                    echo "\nMax Senior Worker Limit Reached For $hospital->name\n";
                    break;
                } else {
                    $initialHosp = Hospital::find($healthworker->hospital_id);
                    echo "$healthworker->name in hospital $initialHosp->name\n";

                    if ($healthworker->id == $initialHosp->headofficer_id && $initialHosp->workersNo < 1){
                        $newHead = Healthworker::where('hospital_id', $initialHosp->id)
                                                ->where('id', '!=', $healthworker->id)
                                                ->first();
                        echo "This the New Head\n";
                        error_log($newHead);
                        $initialHosp->headofficer_id = $newHead->id;
                        $initialHosp->save();
                        echo "New Head officer Set For $initialHosp->name, $newHead->name\n";
                    } elseif ($initialHosp->workersNo < 1){
                        echo "\nThis Senior Health WWorker the only Healthworker so cannot be Relocated\n";
                        break;
                    }
                    
                    $healthworker->hospital_id = $hospital->id;
                    $healthworker->save();

                    echo "$healthworker->name goes to hospital $hospital->name\n";
                    $hospital->seniorWorkerNo++;
                    $hospital->save();
                }
            }
        }

        $hospitals = Hospital::all();
        foreach ($hospitals as $hospital) {
            $healthworkerCount = Healthworker::where('hospital_id', $hospital->id)->count();
            $hospital->workersNo = $healthworkerCount;
            $hospital->save();
            echo "Worker Count in $hospital->name is $hospital->workersNo.\n";
        }
        echo "Worker Count Per Hospital Operation Done.";

        foreach ($hospitals as $hospital) {
            $seniorCount = Healthworker::where('hospital_id', $hospital->id)->where('status', 'senior')->count();
            $hospital->seniorWorkerNo = $seniorCount;
            $hospital->save();
            echo "Senior Worker Count in $hospital->name is $hospital->seniorWorkerNo.\n";
        }
        echo "Set Senior Officers Number Operation Done.";
    }
}
