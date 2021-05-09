<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\SubmitAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class SubmittedController extends Controller
{
    public function submittedAssignment(){
        // $studentInfo = User:: all();
        // $studentCourse= Course::all();
        $AssignmentList=SubmitAssignment::with('studentCourse','studentName')->get();
        // dd($AssignmentList);
        return view('backend.content.SubmittedAssignment.SubmittedAssignment',compact('AssignmentList'));
    }
}
