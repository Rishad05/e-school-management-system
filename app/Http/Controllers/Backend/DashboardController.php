<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Course;
use App\Models\Enrolling;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $courses = Course::all();
        $totalCourse = $courses->count();
        $student= Student::all();
        $totalStudent = $student->count();
        $enrollCourse = Enrolling:: all();
        $totalEnrollCourse = $enrollCourse->count();
        $author = Author::all();
        $totalAuthor = $author->count();
        $saleCourse= Enrolling::where('status','confirm')->get();
        $grandTotalSale=0;
        foreach($saleCourse as $data)
        {
            $grandTotalSale += $data->enrollCourse->course_price;

        }

        $todaySale = Enrolling::where('status','confirm')
        ->whereDate('created_at',now()->today())->get();
        $total_sale=0;
        foreach($todaySale as $data)
        {
            $total_sale += $data->enrollCourse->course_price;
        }


        return view('backend.content.Dashboard.list', compact('totalCourse','totalStudent','totalEnrollCourse', 'totalAuthor','saleCourse', 'grandTotalSale', 'total_sale'));
    }
}
