<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function topic(){
        $lesson=Lesson::all();
        $topicList=Topic::all();
        return view('backend.content.topic.topics', compact('topicList','lesson'));
    }
    public function create(Request $request){
        $file_name='';
        //step1: check request has file?

        if($request->hasFile('topic_file'))
        {
            //file is valid or not
            $file=$request->file('topic_file');
            if($file->isValid())
            {
                //generate unique file name
                $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

                //store image into local directory
                $file->storeAs('topic',$file_name);
            }

        }
        Topic:: create([
            'topic_title'=>$request->topic_title,
            'lesson_id'=>$request->lesson_id,
            'file'=>$file_name


        ]);
        return redirect()->back();
    }
}
