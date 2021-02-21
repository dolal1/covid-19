<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Donor;

class DonorChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $chartData = Donor::select('id', 'name', 'amount')->get()->toArray();
        $nameArray = array_column($chartData, 'name');
        $amountArray = array_column($chartData, 'amount');

        return Chartisan::build()
            ->labels($nameArray)
            ->dataset('Donations', $amountArray);
    }
}