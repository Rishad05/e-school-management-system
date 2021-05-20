<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\confirmation;
use App\Models\Course;
use App\Models\Enrolling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnrollingController extends Controller
{
    public function enrollCourse($id){
        $course=Course::find($id);
        $enrollingList=Enrolling::all();
        return view('frontend.layouts.enrollCourse', compact('course', 'enrollingList'));
    }

    public function buyCourse($id){
        $course=Course::find($id);

        return view('frontend.layouts.buyCourse',compact('course'));
    }

    public function confirmBuyCourse(Request $request){



        Enrolling::create([
                    'course_id'=>$request->course_id,
                    'student_id'=> auth()->user()->id,
                ]);
                return redirect()->back()->with('success', 'Enroll Course Successfully, Please wait for Admin Confirmation after that you can see the course in Your Profile');
    }

    // public function create($id)
    // {
    //     // dd($id);
    //    $add=Enrolling::create([
    //         'course_id'=>$id,
    //         'student_id'=> auth()->user()->id,
    //     ]);
    //     Mail::to (auth()->user()->email)->send(new confirmation($add));
    //
    // }



}
