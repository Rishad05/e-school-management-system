<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellReportController extends Controller
{
    public function report(){
        return view('backend.content.sellReports.report');
    }
}
