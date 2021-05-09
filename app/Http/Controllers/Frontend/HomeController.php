<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $author=Author::all();
        $courses=Course::where('status','=','Published')->take(3)->get();
        return view('frontend.layouts.home',compact('courses', 'author'));
    }
    public function viewAllCourse(){
        $courses=Course::where('status','=','Published')->get();

        return view('frontend.layouts.viewCourse',compact('courses'));
    }
}
