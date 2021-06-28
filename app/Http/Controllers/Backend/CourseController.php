<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrolling;
use App\Models\Lesson;

use App\Models\SubmittedAssignment;
use App\Models\User;
use Throwable;

class CourseController extends Controller
{
    public function course(){
        $author=Author::all();
        $course=Course::paginate(3);

        return view('backend.content.courses.list',compact('course', 'author'));
    }
    public function viewAssignment($id){
        $viewAssignment=Assignment::where('course_id',$id)->get();
        return view('backend.content.viewAssignment.viewAssignment',compact('viewAssignment'));
    }

    public function viewLesson($id){
        $viewLesson=Lesson::where('course_id',$id)->get();
        return view('backend.content.viewLesson.viewLesson',compact('viewLesson'));
    }
    public function submitAssignment($id){
        $assignmentId= $id;
        // $course=SubmittedAssignment::where('student_id',auth()->user()->id)->where('assignment_id',$id)->first();
        if(SubmittedAssignment::where('student_id',auth()->user()->id)->where('assignment_id',$id)->exists()){
            return redirect()->back()->with('error-message', 'You already Submit this assignment');
        }
       else{
        return view('frontend.layouts.submit', compact('assignmentId'));
       }
    }



    public function submitCreate(Request $request, $id){
        $course = Assignment::find($id);

        SubmittedAssignment:: create([
            'assignment_id' => $id,
            'course_id'=>$course->course_id,
            'student_id'=> auth()->user()->id,
            'upload_assignment'=>$request->upload_assignment


        ]);
        return redirect()->back()->with('success', 'Assignment Submitted Successfully');
    }





    public function create(Request $request){
        $file_name='';
        //step1: check request has file?
        if($request->hasFile('course_image'))
        {
            //file is valid or not
            $file=$request->file('course_image');
            if($file->isValid())
            {
                //generate unique file name
                $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

                //store image into local directory
                $file->storeAs('courses',$file_name);
            }

        }
        $request->validate([

            'payment_number' => 'required|digits:11|numeric|regex:/(01)[0-9]{9}/',

        ]);
        Course:: create([
            'course_name'=>$request->course_name,
            'author_id'=>$request->author_id,
            'course_price' =>$request->course_price,
            'payment_number'=>$request->payment_number,
            'image'=>$file_name

        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $course = Course::find($id);


        try {
            $course->delete();
            return redirect()->route('course')->with('error-message', 'Course deleted successfully.');
        }


 catch (Throwable $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error-message', 'Under This  course  already has lessons');
            }
            return back();
        }

    }

    public function editCourse($id)
    {
        $author=Author::all();
        $course = Course::find($id);
        return view('backend.content.courses.edit', compact('course', 'author'));
    }

    public function updateCourse(Request $request, $id)
    {
       $course= Course::find($id);
       if ($request->hasFile('course_image')) {

        $image_path = public_path().'/files/courses/' . $course->image;

        if ($course->image) {
            unlink($image_path);
        }
            $file_name='';
            $file = $request -> file('course_image');
            if ($file -> isValid()) {
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();
                $file -> storeAs('courses',$file_name);
            }

        $course->update([
            'image' => $file_name
        ]);


    }


    //    $course->update([
    //         'course_name'=>$request->course_name,
    //         'course_price' =>$request->course_price,
    //         'author_id'=>$request->author_id,
    //         'payment_number'=>$request->payment_number,
    //     ]);
    //     return redirect()->route('course')->with('success','Course updated successfully');



        if ($course->payment_number  == $request->payment_number)
        {
            $course->update([
                'course_name'=>$request->course_name,
                'course_price' =>$request->course_price,
                'author_id'=>$request->author_id,
                'payment_number'=>$request->payment_number,
            ]);
        }
        else{
            $request->validate([

                'payment_number' => 'required|digits:11||regex:/(01)[0-9]{9}/|numeric',
            ]);
            $course->update([
                'course_name'=>$request->course_name,
                'course_price' =>$request->course_price,
                'author_id'=>$request->author_id,
                'payment_number'=>$request->payment_number,
            ]);
        }
        return redirect()->route('course')->with('success',$course->course_name.' '.'info update successfully');
    }



    public function completedUpdate( $id, $status)
    {
        $course= Course::find($id);

        $course->update(['status'=>$status]);

        return redirect()->back();
    }
}
