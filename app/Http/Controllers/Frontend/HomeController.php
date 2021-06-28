<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $author=Author::all();
        $courses=Course::where('status','=','Published')->take(3)->get();
        $review=Review::all();
        return view('frontend.layouts.home',compact('courses', 'author','review'));
    }
    public function viewAllCourse(){
        $courses=Course::where('status','=','Published')->get();

        return view('frontend.layouts.viewCourse',compact('courses'));
    }
}
