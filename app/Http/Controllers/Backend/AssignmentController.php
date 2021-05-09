<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function assignment(){
        $course=Course::all();
        $assignment= Assignment::all();
        return view('backend.content.Assignment.assignmentList',compact('assignment', 'course'));
    }
    public function create(Request $request){


        Assignment:: create([
            'Assignment_Name'=>$request->Assignment_Name,
            'course_id'=>$request->course_id,
            'Assignment_description'=>$request->Assignment_description,
        ]);
        return redirect()->back();
    }
}
