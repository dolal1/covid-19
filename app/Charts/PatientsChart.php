<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Hospital;

class PatientsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $chartData = Hospital::select('id', 'name', 'patientNo', 'workersNo')->get()->toArray();
        $nameArray = array_column($chartData, 'name');
        $patientNoArray = array_column($chartData, 'patientNo');
        $workerNoArray = array_column($chartData, 'workersNo');

        return Chartisan::build()
            ->labels($nameArray)
            ->dataset('Patients', $patientNoArray)
            ->dataset('Health Workers', $workerNoArray);
    }
}