<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Paymentstructure;
use App\Models\Donor;
use App\Models\Treasury;

include ("PayLogic.php");

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payLogic = new PayLogic();
        $totalMonthly = $payLogic->getTotalMonthly();
        $remainingMonthly = $totalMonthly;

        $payments = Payment::orderBy('created_at', 'desc')->paginate(10);
        $lastPaidMonth = Payment::orderBy('created_at', 'desc')->pluck('month')->first();
        $lastPaidAmount = Payment::orderBy('created_at', 'desc')->pluck('amount_paid')->first();
        $month = date('m');
        if($lastPaidMonth == $month)
        {
            $remainingMonthly = $totalMonthly - $lastPaidAmount;
        }
        
        $excess = Treasury::find(1)->excess;
        //if we have enugh money to pay and also,
        //if payment for the current month hasnt been made already
        $isInExcess = ($excess >= 1)&&($lastPaidMonth != $month) ? true : false;
        return view('payments.index', [
            'payments' => $payments,
            'isInExcess' => $isInExcess,
            'availableFunds' => $remainingMonthly
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payLogic = new PayLogic();
        $totalMonthly = $payLogic->getTotalMonthly();
        if ($totalMonthly > 100000000){
            $payableFunds = $payLogic->getPayableFunds();

            $directorTotal = $payLogic->directorTotal();
            $superintendentTotal = $payLogic->superintendentTotal();
            $adminTotal = $payLogic->adminTotal();
            $healthOfficerTotal = $payLogic->healthOfficerTotal();
            $seniorHOfficerTotal = $payLogic->seniorHOfficerTotal();
            $consultantTotal = $payLogic->consultantTotal();
            $headHOfficerTotal = $payLogic->headHOfficerTotal();

            $totalPaid = $payLogic->totalPayments();
            $balanceAfterPaying = $payLogic->balance();

            return view('payments.create', [
                'totalMonthly' => $totalMonthly,
                'payableFunds' => $payableFunds,
                'directorTotal' => $directorTotal,
                'superintendentTotal' => $superintendentTotal,
                'adminTotal' => $adminTotal,
                'healthOfficerTotal' => $healthOfficerTotal,
                'seniorHOfficerTotal' => $seniorHOfficerTotal,
                'consultantTotal' => $consultantTotal,
                'headHOfficerTotal' => $headHOfficerTotal,
                'totalPaid' => $totalPaid,
                'balanceAfterPaying' => $balanceAfterPaying,
                ]);
        } else
        {
            dd('Cant make payments');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store the payment in payments table
        
        $payLogic = new PayLogic();
        $month = date('m');
        $payment = new Payment();

        $payment->month = $month;
        $payment->amount_paid = request('totalPaid');

        $payment->save();
        //store the salrary structure in paymentstructures table
        $directorTotal = $payLogic->directorTotal();
        $superintendentTotal = $payLogic->superintendentTotal();
        $adminTotal = $payLogic->adminTotal();
        $healthOfficerTotal = $payLogic->healthOfficerTotal();
        $seniorHOfficerTotal = $payLogic->seniorHOfficerTotal();
        $consultantTotal = $payLogic->consultantTotal();
        $headHOfficerTotal = $payLogic->headHOfficerTotal();
        

        $paymentstructure = new Paymentstructure();

        $paymentstructure->month = $month;
        $paymentstructure->admin = $adminTotal;
        $paymentstructure->director = $directorTotal;
        $paymentstructure->superintendent = $superintendentTotal;
        $paymentstructure->headHOfficer = $headHOfficerTotal;
        $paymentstructure->consultant = $consultantTotal;
        $paymentstructure->seniorHOfficer = $seniorHOfficerTotal;
        $paymentstructure->healthOfficer = $healthOfficerTotal;

        $paymentstructure->save();

        return redirect('/payments')->with('msg', "Payment succesfull");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        $paymentstructure = Paymentstructure::where('month', $payment->month)->first();
        return view('payments.show', [
            'payment' => $payment,
            'structure' => $paymentstructure,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect('/payments')->with('msg', "Payment Deleted.");
    }
}
