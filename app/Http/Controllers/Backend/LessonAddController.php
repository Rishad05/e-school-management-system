<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;

class LessonAddController extends Controller
{
    public function lesson(){
        $course=Course::all();
        $lessonList=Lesson::all();
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
        $author = Lesson::find($id);
        $author->delete();
        return redirect()->route('lesson');
    }
}
