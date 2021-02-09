<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayLogic
{
    //Monthly amount
    public function getTotalMonthly()
    {
        $total = DB::table('donors')->whereMonth('created_at', date('m'))->sum('amount');
        return $total;
    }

    //amount in treasury to be used for payments
    public function getPayableFunds()
    {
        $total = $this->getTotalMonthly();
        if ($total > 100000000)
            $payable = $total - 100000000;
        else $payable = 0;
        return $payable;
    }
    //total number of ho's(All Hospitals)
    public function getTotalOfficers()
    {
        $total = DB::table('healthworkers')->count('id');
        return $total;
    }

    //number of heads according to their categories.

    //number of directors
    public function getDirectorsNo()
    {
        //since each national hospital has a director.
        $total = DB::table('hospitals')->where('level', 'National')->count('id');
        return $total;
    }
    //number of superintendets
    public function getSuperintendentsNo()
    {
        //since each regional hospital has a Superintendet.
        $total = DB::table('hospitals')->where('level', 'Regional')->count('id');
        return $total;
    }
    //number of head hos
    public function getHeadsNo()
    {
        //since each general hospital has a head HO.
        $total = DB::table('hospitals')->where('level', 'General')->count('id');
        return $total;
    }

    //The heads above are deducted from the numbers below

    //number of entry ho's(Genenral Hosp)
    public function getEntryHOsNo()
    {
        $headsNo = $this->getHeadsNo();
        $total = DB::table('healthworkers')->where('status', 'Entry')->count('id');
        return ($total - $headsNo);
    }
    //number of senior ho's(Regional Hosp)
    public function getSeniorHOsNo()
    {
        $suprsNo = $this->getSuperintendentsNo();
        $total = DB::table('healthworkers')->where('status', 'Senior')->count('id');
        return ($total - $suprsNo);
    }
    //number of consultant ho's(National Hosp)
    public function getConsultantHOsNo()
    {
        $directorsNo = $this->getDirectorsNo();
        $total = DB::table('healthworkers')->where('status', 'Consultant')->count('id');
        return ($total - $directorsNo);
    }


    //Payment Logic

    //Basic Salary first minus bonus

    //director basic salary
    public function directorSalary()
    {
        $directorSal = 5000000;
        return $directorSal;
    }
    //Superintendent basic salary
    public function superintendentSalary()
    {
        $directorSalary = $this->directorSalary();
        $suprSal = (1 / 2) * $directorSalary;
        return $suprSal;
    }
    //Admin basic salary
    public function adminSalary()
    {
        $suprSalary = $this->superintendentSalary();
        $adminSal = (3 / 4) * $suprSalary;
        return $adminSal;
    }
    //HO basic salary
    public function healthOfficerSalary()
    {
        $adminSalary = $this->adminSalary();
        $hoffSal = (8 / 5) * $adminSalary;
        return $hoffSal;
    }
    //Senior HO basic salary
    public function seniorHOfficerSalary()
    {
        $hoffSalary = $this->healthOfficerSalary();
        $senOffSal = $hoffSalary + ((6 / 100) * $hoffSalary);
        return $senOffSal;
    }
    //Head HO basic salary
    public function headHOfficerSalary()
    {
        $hoffSalary = $this->healthOfficerSalary();
        $headHOffSal = $hoffSalary + ((3.5 / 100) * $hoffSalary);
        return $headHOffSal;
    }
    //total salaries
    public function totalSalaries()
    {
        //Total payments (multiply by the number)
        $adminSalary = ($this->adminSalary()) * 1; //one admin
        //heads
        $allDirectorsSalary = ($this->directorSalary()) * ($this->getDirectorsNo());
        $allSuprsSalary = ($this->superintendentSalary()) * ($this->getSuperintendentsNo());
        $allHeadsSalary = ($this->headHOfficerSalary()) * ($this->getHeadsNo());
        //workers
        $allHoffsSalary = ($this->healthOfficerSalary()) * ($this->getEntryHOsNo());
        $allSeniorsSalary = ($this->seniorHOfficerSalary()) * ($this->getSeniorHOsNo());
        //Consultant(National Hosp) gets the same as Senior HO. Just one time 10,000,000
        // when hez upgraded from senior.
        $allConsultantsSalary = ($this->seniorHOfficerSalary()) * ($this->getConsultantHOsNo());

        $sum = ($adminSalary + $allDirectorsSalary + $allSuprsSalary + $allHeadsSalary + $allHoffsSalary + $allSeniorsSalary + $allConsultantsSalary);
        return $sum;
    }
    //End of basic salary

    //Calculate remainder after salaries
    public function remainder()
    {
        $payable = $this->getPayableFunds();
        $totalSalaries = $this->totalSalaries();

        $remainder = 100000000 + ($payable - $totalSalaries);
        return $remainder;
    }


    //Bonuses

    //Director bonus
    public function directorBonus()
    {
        $remaining = $this->remainder();
        $directorBon = ((5 / 100) * $remaining);
        return $directorBon;
    }
    //Superintendent bonus
    public function superintendentBonus()
    {
        $directorBonus = $this->directorBonus();
        $suprBon = (1 / 2) * $directorBonus;
        return $suprBon;
    }
    //Admin bonus
    public function adminBonus()
    {
        $suprBonus = $this->superintendentBonus();
        $adminBon = (3 / 4) * $suprBonus;
        return $adminBon;
    }
    //HO bonus
    public function healthOfficerBonus()
    {
        $adminBonus = $this->adminBonus();
        $hoffBon = (8 / 5) * $adminBonus;
        return $hoffBon;
    }
    //Senior HO bonus
    public function seniorHOfficerBonus()
    {
        $hoffBonus = $this->healthOfficerBonus();
        $senOffBon = $hoffBonus + ((6 / 100) * $hoffBonus);
        return $senOffBon;
    }
    //Head HO bonus
    public function headHOfficerBonus()
    {
        $hoffBonus = $this->healthOfficerBonus();
        $headHOffBon = $hoffBonus + ((3.5 / 100) * $hoffBonus);
        return $headHOffBon;
    }
    //total bonuses
    public function totalBonuses()
    {
        //Total payments (multiply by the number)
        $adminBonus = ($this->adminBonus()) * 1; //one admin
        //heads
        $allDirectorsBonus = ($this->directorBonus()) * ($this->getDirectorsNo());
        $allSuprsBonus = ($this->superintendentBonus()) * ($this->getSuperintendentsNo());
        $allHeadsBonus = ($this->headHOfficerBonus()) * ($this->getHeadsNo());
        //workers
        $allHoffsBonus = ($this->healthOfficerBonus()) * ($this->getEntryHOsNo());
        $allSeniorsBonus = ($this->seniorHOfficerBonus()) * ($this->getSeniorHOsNo());
        //Consultant(National Hosp) gets the same as Senior HO.
        $allConsultantsBonus = ($this->seniorHOfficerBonus()) * ($this->getConsultantHOsNo());

        $sum = ($adminBonus + $allDirectorsBonus + $allSuprsBonus + $allHeadsBonus + $allHoffsBonus + $allSeniorsBonus + $allConsultantsBonus);
        return $sum;
    }
    //End of bonuses

    //Total payments for each worker.
    //Director total
    public function directorTotal()
    {
        $directorSalary = $this->directorSalary();
        $directorBonus = $this->directorBonus();
        $directorTot = $directorSalary + $directorBonus;
        return $directorTot;
    }
    //Superintendent Total
    public function superintendentTotal()
    {
        $superintendentSalary = $this->superintendentSalary();
        $superintendentBonus = $this->superintendentBonus();
        $superintendentTot = $superintendentSalary + $superintendentBonus;
        return $superintendentTot;
    }
    //Admin Total
    public function adminTotal()
    {
        $adminSalary = $this->adminSalary();
        $adminBonus = $this->adminBonus();
        $adminTot = $adminSalary + $adminBonus;
        return $adminTot;
    }
    //HO Total
    public function healthOfficerTotal()
    {
        $healthOfficerSalary = $this->healthOfficerSalary();
        $healthOfficerBonus = $this->healthOfficerBonus();
        $healthOfficerTot = $healthOfficerSalary + $healthOfficerBonus;
        return $healthOfficerTot;
    }
    //Senior HO Total
    public function seniorHOfficerTotal()
    {
        $seniorHOfficerSalary = $this->seniorHOfficerSalary();
        $seniorHOfficerBonus = $this->seniorHOfficerBonus();
        $seniorHOfficerTot = $seniorHOfficerSalary + $seniorHOfficerBonus;
        return $seniorHOfficerTot;
    }

    //Covid-19 Consultant Total
    public function consultantTotal()
    {
        $seniorHOfficerSalary = $this->seniorHOfficerSalary();
        $seniorHOfficerBonus = $this->seniorHOfficerBonus();
        $seniorHOfficerTot = $seniorHOfficerSalary + $seniorHOfficerBonus;
        return $seniorHOfficerTot;
    }
    //Head HO Total
    public function headHOfficerTotal()
    {
        $headHOfficerSalary = $this->headHOfficerSalary();
        $headHOfficerBonus = $this->headHOfficerBonus();
        $headHOfficerTot = $headHOfficerSalary + $headHOfficerBonus;
        return $headHOfficerTot;
    }
    //End of total payments

    public function totalPayments()
    {
        $totalSalaries = $this->totalSalaries();
        $totalBonuses = $this->totalBonuses();
        return ($totalSalaries + $totalBonuses);
    }

    //Monthly Balance after payment of salaries and bonus
    public function balance()
    {
        $totalPaid = $this->totalPayments();

        $total = $this->getTotalMonthly();

        $bal = $total - $totalPaid;
        return $bal;
    }

}
