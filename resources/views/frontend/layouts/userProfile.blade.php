@extends('frontend.main')
@section('content')

<div class="row m-3">
    <div class="col-md-10 m-auto">

        <div class="container d-flex justify-content-center">
            <div class="profileCard p-3 py-4">
                <div class="text-center"> <img src="{{url('/files/student/'.$studentPro->std->image)}}" width="200" class="rounded-circle">
                    <h3 class="mt-2">Name: {{$studentPro->name}}</h3> <span class="mt-1 clearfix">User email: {{$studentPro->email}}</span>
                </div>
            </div>
        </div>

{{--
                  <div class="profilecard shadow-sm ">
                    <img src="" width="100" class="rounded-circle">
                    <div class="profilecard-body">
                        <h4 class="text-dark"></h4>
                        <p class="text-dark"></p>
                  </div>
                </div> --}}



    </div>

</div>
<div class="row">
    <div style="background: lightseagreen" class="col-md-8 m-auto p-5 rounded shadow">
        <table class="table mt-5 mb-5 p-5  rounded bg-light ">
            <thead>


              <tr>
                <th scope="col">serial</th>
                <th scope="col">course_name</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            @foreach ($course as $key=> $data)
            <tbody>
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->enrollCourse->course_name}}</td>
                <td>
                    <a class="btn btn-info" href="{{route('studentViewLesson',$data->enrollCourse->id)}}">View Lesson </a>
                    <a class="btn btn-info" href="{{route('studentViewAssignment',$data->enrollCourse->id)}}">View Assignment </a>
                    <a class="btn btn-info"  href="{{route('giveReview')}}">Give Feedback</a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

</div>




@endsection
