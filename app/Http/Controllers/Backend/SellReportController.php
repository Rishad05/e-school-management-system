<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Enrolling;
use Illuminate\Http\Request;

class SellReportController extends Controller
{
    public function report(){
        $courseList =[];
        if(isset($_GET['from_date']))
        {
            $fromDate = date('Y-m-d',strtotime($_GET['from_date']));
            $toDate = date('Y-m-d',strtotime($_GET['to_date']));
            $courseList = Enrolling::whereBetween('created_at',[$fromDate,$toDate])->get();
        }


        return view('backend.content.sellReports.report', compact('courseList'));
    }
}
