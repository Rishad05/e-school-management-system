<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;

use App\Models\SubmittedAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class SubmittedController extends Controller
{
    public function submittedAssignment(){
        $AssignmentList=SubmittedAssignment::with('studentCourse','studentName')->get();
        // dd($AssignmentList);
        return view('backend.content.SubmittedAssignment.SubmittedAssignment',compact('AssignmentList'));
    }
}
