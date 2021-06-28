<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\confirmEnrollCourse;
use App\Models\Course;
use App\Models\Enrolling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnrollingController extends Controller
{
    public function enrollCourse($id){
        $course=Course::find($id);
        $enrollingList=Enrolling::all();

        if(Enrolling::where('student_id',auth()->user()->id)->where('course_id',$id)->exists()){
            return redirect()->back()->with('error-message', 'You already take this course');
        }
        else{
            return view('frontend.layouts.enrollCourse', compact('course', 'enrollingList'));
        }
    }

    public function buyCourse($id){
        $course=Course::find($id);

        return view('frontend.layouts.buyCourse',compact('course'));
    }

    public function confirmBuyCourse(Request $request){
        // dd($request->all());
        // $enrollingList=Enrolling::where();
        $request->validate([

            'payment_number' => 'required|digits:11|numeric|regex:/(01)[0-9]{9}/',
            'trans_id' => 'required|unique:enrollings|min:10',

        ]);




            $enrollCourse=Enrolling::create([
                'course_id'=>$request->course_id,
                'student_id'=> auth()->user()->id,
                'payment_number'=>$request->payment_number,
                'trans_id'=>$request->trans_id
            ]);
            Mail::to (auth()->user()->email)->send(new confirmEnrollCourse($enrollCourse));

            return redirect()->route('homepage')->with('success', 'Enroll Course Successfully, Please wait for Admin Confirmation  via email after that you can see the course in Your Profile. If you do not get any email in 2days then contact with us via this number 01843080023.');

    }
}
