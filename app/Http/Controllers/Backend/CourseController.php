<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrolling;
use App\Models\Lesson;
use App\Models\SubmitAssignment;
use App\Models\User;

class CourseController extends Controller
{
    public function course(){
        $author=Author::all();
        $course=Course::all();

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

        return view('frontend.layouts.submit', compact('assignmentId'));
    }



    public function submitCreate(Request $request, $id){
        $course = Assignment::find($id);

        SubmitAssignment:: create([

            'course_id'=>$course->course_id,
            'student_id'=> auth()->user()->id,
            'upload_assignment'=>$request->upload_assignment


        ]);
        return redirect()->back()->with('success', 'Assignment Submitted Successfully');;
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
        Course:: create([
            'course_name'=>$request->course_name,
            'author_id'=>$request->author_id,
            'course_price' =>$request->course_price,
            'image'=>$file_name

        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course');
    }

    public function editCourse($id)
    {
        $author=Author::all();
        $course = Course::find($id);
        return view('backend.content.courses.edit', compact('course', 'author'));
    }

    public function updateCourse(Request $request, $id)
    {
        Course::find($id)->update([
            'course_name'=>$request->course_name,
            'course_price' =>$request->course_price,
            'author_id'=>$request->author_id,
        ]);
        return redirect()->route('course')->with('success','Course updated successfully');
    }



    public function completedUpdate( $id, $status)
    {
        $course= Course::find($id);

        $course->update(['status'=>$status]);

        return redirect()->back();
    }
}
