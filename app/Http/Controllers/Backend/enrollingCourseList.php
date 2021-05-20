<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Enrolling;
use Illuminate\Http\Request;

class enrollingCourseList extends Controller
{
    public function enrollingCourseList(){
        $courseList=Enrolling::with('enrollCourse','studentName')->get();
        $studentList=Enrolling::with('studentName')->get();
        return view('backend.content.enrollCourseList.enrollCourseList',compact('courseList', 'studentList'));
    }
    public function statusUpdate( $id, $status)
    {
        $enroll= Enrolling::find($id);

        $enroll->update(['status'=>$status]);

        return redirect()->back();
    }
}
