@extends('frontend.main')

@section('content')


<section id="course" class="text-center border-bottom">



    <div  class="album py-5 bg-light">
        <h1 class="fw-bolder text-info pb-4">Our Courses</h1>

        <div class="container">



            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

@foreach($courses as $data)

                <div class="col">
                    <div class="card shadow rounded h-100 ">
                        <img class="h-80 w-80" src="{{url('files/courses/'.$data->image)}}" alt="course image">
                        <div class="card-body">
                            <p class="card-text">Course Title: {{$data->course_name}}</p>
                            <p class="card-text">Author: {{$data->courseAuthor->author_name}}</p>
                            <div class=" d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <small class="text-secodary">{{$data->course_price}} BDT</small>
                                </div>

                                <a type="button" href="{{route('enroll.course', $data->id)}}" class="btn btn-sm btn-danger">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>

</section>

@endsection
