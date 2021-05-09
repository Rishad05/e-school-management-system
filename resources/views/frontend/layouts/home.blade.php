@extends('frontend.main')

@section('content')



    <section class=" text-center fluid-container">

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
          <img src="{{url('files/courses/'.$data->image)}}" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Course Title: {{$data->course_name}}</h5>
            <p class="card-text">Author: {{$data->courseAuthor->author_name}}</p>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <small class="text-secodary">{{$data->course_price}} BDT</small>
            <a type="button" href="{{route('enroll.course', $data->id)}}" class="btn btn-sm btn-danger">Enroll Now</a>
          </div>
        </div>


      </div>




            {{-- <div class="row">
                <div class="col-md-4">
                    <div class="card shadow rounded h-100 ">
                        <img src="{{url('files/courses/'.$data->image)}}" alt="course image">
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
            </div> --}}

                    @endforeach


                </div>
            </div>
        </div>

    </section>
@endsection
