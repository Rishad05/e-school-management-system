<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Enrolling;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Topic;
use App\Models\User;

class StudentController extends Controller
{
    public function student(){
        $studentCourse=Course::all();
        $studentInfo=User::all();
        $studentList=Student::all();

        return view('backend.content.student.list', compact('studentList', 'studentInfo', 'studentCourse'));
    }


    public function userProfile(){

        $studentPro=User::find(auth()->user()->id);

        $course=Enrolling::with('enrollCourse')->where('student_id',auth()->user()->id)->get();

        // $course= Enrolling::where('user_id'->student_id)->get();
        return view('frontend.layouts.userProfile', compact( 'studentPro','course'));
    }

    public function studentViewLesson($id){

        $courses=Lesson::where('course_id',$id)->get();

        return view('frontend.layouts.studentViewLesson',compact('courses'));
    }

    public function studentViewTopic($id){

        $courseTopic=Topic::where('lesson_id',$id)->get();

        return view('frontend.layouts.studentViewTopic',compact('courseTopic'));
    }
    public function studentViewAssignment($id){

        $courses=Assignment::where('course_id',$id)->get();
        // dd($courses);

        return view('frontend.layouts.studentViewAssignment',compact('courses'));
    }


    public function create(Request $request){
        $file_name='';
        //step1: check request has file?
        if($request->hasFile('student_image'))
        {
            //file is valid or not
            $file=$request->file('student_image');
            if($file->isValid())
            {
                //generate unique file name
                $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

                //store image into local directory
                $file->storeAs('student',$file_name);
            }

        }
        Student:: create([
            'user_id'=>$request->user_id,
            'course_id'=>$request->course_id,
            'image'=>$file_name


        ]);
        return redirect()->back();
    }
}
