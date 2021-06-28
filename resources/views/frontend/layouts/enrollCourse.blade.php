@extends('frontend.main')
@section('content')
<div class="card mb-3 m-auto mt-5  shadow rounded" style="max-width: 540px;">
    <div class="row g-0 d-flex justify-content-between">
      <div class="col-md-3">
        <img class="w-100" src="{{url('files/courses/'.$course->image)}}" alt="...">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h5 class="card-title">Name: {{$course->course_name}}</h5>
          <p class="card-text"><small class="text-muted">by {{$course->courseAuthor->author_name}}</small></p>
          <p class="card-text"><small class="text-muted">Payment No: {{$course->payment_number}}</small></p>
          <div class=" d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <small class="text-secodary">{{$course->course_price}} BDT</small>
            </div>
        </div>
        </div>
        <div class="card-footer">
            <a type="button" href="{{route('buyCourse', $course->id)}}" class="btn btn-sm btn-danger float-end">Buy Now</a>
          </div>
      </div>
    </div>

  </div>

@endsection
