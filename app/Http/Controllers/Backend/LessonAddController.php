<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;
use Throwable;

class LessonAddController extends Controller
{
    public function lesson(){
        $course=Course::all();
        $lessonList=Lesson::paginate(3);
        return view('backend.content.lesson.add', compact('lessonList','course'));
    }
    public function viewTopic($id){
        $viewTopic=Topic::where('lesson_id',$id)->get();
        return view('backend.content.viewTopic.viewTopic',compact('viewTopic'));
    }
    public function create(Request $request){

        Lesson:: create([
            'lesson_name'=>$request->lesson_name,
            'course_id'=>$request->course_id,
            'description'=>$request->description,


        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $lesson = Lesson::find($id);
        try {
            $lesson->delete();
            return redirect()->route('lesson')->with('error-message', 'Lesson deleted successfully.');
        }


        catch (Throwable $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error-message', 'Under This  lesson  already has topic');
            }
            return back();
        }
    }
    public function editLesson($id)
    {
        $course=Course::all();
        $lessonList = Lesson::find($id);
        return view('backend.content.lesson.edit', compact('course', 'lessonList'));
    }
    public function updateLesson(Request $request, $id)
    {
       Lesson::find($id)->update([
        'lesson_name'=>$request->lesson_name,
        'course_id'=>$request->course_id,
        'description'=>$request->description,
        ]);
        return redirect()->route('lesson')->with('success','Lesson updated successfully');
    }
}
