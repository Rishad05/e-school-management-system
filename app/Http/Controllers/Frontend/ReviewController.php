<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function giveReview(){
        return view('frontend.layouts.review');
    }
    public function submitReview(Request $request)
        {
            // dd($request)
            Review::create([

                'user_id'=>auth()->user()->id,
                'rate'=>$request->input('rate'),
                 'message'=>$request->input('message'),
            ]);
            return redirect()->back()->with('success', 'Feedback given Successfully');


        }




}
