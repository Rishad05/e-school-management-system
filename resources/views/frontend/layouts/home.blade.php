@extends('frontend.main')
@section('content')
    <section class=" text-center fluid-container">
        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
        @if (session()->has('error-message'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner carouselImg">
                  <div class="carousel-item active ">
                    <img src={{asset('images/school.jpg')}} class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src= {{asset('images/school2.jpg')}} class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src= {{asset('images/school3.jpg')}} class="d-block w-100" alt="...">
                  </div>
                </div>

                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">

                </button>
                <button class="carousel-control-next px-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">

                </button>

                <div class="col-lg-6 col-md-8 mx-auto static">
                    <h1 class="fw-light fw-bolder text-info">Welcome To E-School</h1>
                    <p>
                        @auth()
                         <button class="btn btn-danger" style="color:white;">{{auth()->user()->name}}</button>
                    @else
                        <a class="btn btn-danger" href="{{route('login.registration.form')}}">Get Started</a>
                    @endauth
                    </p>
                </div>
              </div>



        </div>
    </section>

    <section id="course" class=" text-center border-bottom">
        <div  class="album py-5 bg-light">
            <h1 class="fw-bolder text-info pb-3">Our Courses</h1>
            <div class="mb-5 pe-5">
                <a href="{{route('viewAllCourse')}}" class="btn btn-dark fw-bolder float-end  "> See More Courses  <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">

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
    <section id="feedback" >
        <h1 class="text-center m-auto fw-bolder text-info pb-4 ">User Feedback</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 bg-secondary p-5 " >
         @foreach($review as $data)
                        <div class="col mt-5">
                            <div style="color:rgb(196, 252, 224)"class="card shadow-sm h-100 text-dark rounded shadow" style="height:250px;width:270px;">
                                <div class="card-body" >
                                    <p class="card-text">Name: {{$data->reviewUser->name}}</p>
                                    <p class="card-text">Email: {{$data->reviewUser->email}}</p>
                                    <p class="card-text">Rate: {{$data->rate}}</p>
                                    <p class="card-text">Opinion: {{$data->message}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
        </section>
@endsection
