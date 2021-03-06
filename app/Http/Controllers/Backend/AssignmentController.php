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
        $assignment= Assignment::paginate(3);
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
    public function delete($id)
    {
        $assignment = Assignment::find($id);
        if($assignment){
            $assignment->delete();
        }

        return redirect()->route('assignment');
    }

    public function editAssignment($id)
    {
        $course=Course::all();
        $assignment = Assignment::find($id);
        return view('backend.content.Assignment.edit', compact('course', 'assignment'));
    }
    public function updateAssignment(Request $request, $id)
    {
        Assignment::find($id)->update([
            'Assignment_Name'=>$request->Assignment_Name,
            'course_id'=>$request->course_id,
            'Assignment_description'=>$request->Assignment_description,
        ]);
        return redirect()->route('assignment')->with('success','Assignment updated successfully');
    }
}
