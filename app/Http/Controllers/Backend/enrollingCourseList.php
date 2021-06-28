<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\confirmation;
use App\Models\Enrolling;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $student = User::find($enroll->studentName->id);
        if($status=='confirm'){

        $enroll->update(['status'=>$status]);

        Mail::to($student->email)->send(new confirmation($enroll));
        }
        if($status=='cancel'){
            $enroll->delete();
        }


        return redirect()->back();
    }
}
