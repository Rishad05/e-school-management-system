@extends('frontend.main')

@section('content')


<section id="course" class="text-center border-bottom">

    @if (session()->has('error-message'))
    <div class="alert alert-danger d-flex justify-content-between">
        {{ session()->get('error-message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div  class="album py-5 bg-light">
        <h1 class="fw-bolder text-info pb-4">Our Courses</h1>

        <div class="container">



            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

@foreach($courses as $data)

            <div class="card-group">
                <div class="card">
                <img class="w-100 h-100" src="{{url('files/courses/'.$data->image)}}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Course Title: {{$data->course_name}}</h5>
                    <p class="card-text">Author: {{$data->courseAuthor->author_name}}</p>
                    <span>Payment No: {{$data->payment_number}}</span>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <small class="text-secodary">{{$data->course_price}} BDT</small>
                    <a type="button" href="{{route('enroll.course', $data->id)}}" class="btn btn-sm btn-danger">Enroll Now</a>
                </div>
                </div>
            </div>


                @endforeach



            </div>
        </div>
    </div>

</section>

@endsection
