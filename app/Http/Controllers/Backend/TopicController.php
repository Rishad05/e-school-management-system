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
        $topicList=Topic::paginate(3);
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

    public function delete($id)
    {
        $author = Topic::find($id);
        $author->delete();
        return redirect()->route('topic');
    }
    public function editTopic($id)
    {
        $lesson=Lesson::all();
        $topic = Topic::find($id);
        return view('backend.content.Topic.edit', compact('topic', 'lesson'));
    }

    public function updateTopic(Request $request, $id)
    {
       $topic= Topic::find($id);
       if ($request->hasFile('topic_file')) {

        $file_path = public_path().'/files/topic/' . $topic->file;

        if ($topic->file) {
            unlink($file_path);
        }
            $file_name='';
            $file = $request -> file('topic_file');
            if ($file -> isValid()) {
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();
                $file -> storeAs('topic',$file_name);
            }

        $topic->update([
            'file'=>$file_name
        ]);


    }


       $topic->update([
        'topic_title'=>$request->topic_title,
        'lesson_id'=>$request->lesson_id,
        ]);
        return redirect()->route('topic')->with('success','topic updated successfully');
    }

}
