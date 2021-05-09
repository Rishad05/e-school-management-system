<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author(){
        $author=Author::all();
        return view('backend.content.author.list', compact('author'));
    }
    public function create(Request $request){
        $file_name='';
        //step1: check request has file?
        if($request->hasFile('author_image'))
        {
            //file is valid or not
            $file=$request->file('author_image');
            if($file->isValid())
            {
                //generate unique file name
                $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

                //store image into local directory
                $file->storeAs('author',$file_name);
            }

        }

        Author:: create([
            'author_name'=>$request->author_name,
            'Author_Email'=>$request->Author_Email,
            'Contact_No'=>$request->Contact_No,
            'Salary'=>$request->Salary,
            'image'=>$file_name

        ]);
        return redirect()->back();
    }

}
