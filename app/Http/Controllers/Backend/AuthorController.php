<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Throwable;

class AuthorController extends Controller
{
    public function author(){
        $author=Author::paginate(3);
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
        $request->validate([

            'Contact_No' => 'required|digits:11|numeric|regex:/(01)[0-9]{9}/|unique:authors',
            'Author_Email'=>'email|required|unique:authors',

        ]);
        Author:: create([
            'author_name'=>$request->author_name,
            'Author_Email'=>$request->Author_Email,
            'Contact_No'=>$request->Contact_No,
            'image'=>$file_name

        ]);
        return redirect()->back();
    }


    public function delete($id)
    {
        $author = Author::find($id);
        try {
            $author->delete();
            return redirect()->route('author')->with('error-message', 'Author deleted successfully.');
        }
        catch (Throwable $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error-message', 'Under This  Author  already has course');
            }
            return back();
        }
    }
    public function editAuthor($id)
    {
        // $author=Author::all();
        $author = Author::find($id);
        return view('backend.content.author.edit', compact('author'));
    }

    public function updateAuthor(Request $request, $id)
    {
       $author= Author::find($id);
       if ($request->hasFile('author_image')) {

        $image_path = public_path().'/files/author/' . $author->image;

        if ($author->image) {
            unlink($image_path);
        }
            $file_name='';
            $file = $request -> file('author_image');
            if ($file -> isValid()) {
                $file_name = date('Ymdhms').'.'.$file -> getClientOriginalExtension();
                $file -> storeAs('author',$file_name);
            }

        $author->update([
            'image' => $file_name
        ]);


    }
    //    $author->update([
    //     'author_name'=>$request->author_name,
    //     'Author_Email'=>$request->Author_Email,
    //     'Contact_No'=>$request->Contact_No,
    //     ]);
    //     return redirect()->route('author')->with('success','Author Info updated successfully');




        if ($author->Author_Email  == $request->Author_Email  && $author->Contact_No == $request->Contact_No)
        {
            $author->update([
                'author_name'=>$request->author_name,

                ]);
        }
        else if($author->Author_Email  == $request->Author_Email)
        {
            $request->validate([
                'Contact_No' => 'required|digits:11|regex:/(01)[0-9]{9}/|numeric|unique:authors',
            ]);
            $author->update([
                'author_name'=>$request->author_name,
                'Contact_No'=>$request->Contact_No,
                ]);
        }
        else if($author->Contact_No == $request->Contact_No)
        {
            $request->validate([
            'Author_Email' => 'email|required|unique:authors',
        ]);
        $author->update([
            'author_name'=>$request->author_name,
            'Author_Email'=>$request->Author_Email,

            ]);
        }
        else{
            $request->validate([
                'Author_Email' => 'email|required|unique:authors',
                'Contact_No' => 'required|digits:11||regex:/(01)[0-9]{9}/|numeric|unique:authors',
            ]);
            $author->update([
                'author_name'=>$request->author_name,
                'Author_Email'=>$request->Author_Email,
                'Contact_No'=>$request->Contact_No,
                ]);
        }
        return redirect()->route('author')->with('success',$author->author_name.' '.'info update successfully');

    }

}
