@extends('frontend.Main')
@section('content')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
            <table class="table  table-sm">
              <thead>
                <tr>
                  <th>Lesson_Id</th>
                  <th>Lesson_name</th>

                  <th>Course_Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $key=> $data)

          <tr>
            <th scope="row">{{$key+1}}</th>

            <td>{{$data->lesson_name}}</td>
            <td>{{$data->studentCourse->course_name}}</td>
            <td>{{$data->description}}</td>
            <td>
                <a href="{{route('studentViewTopic', $data->studentCourse->id)}}" class="btn btn-info">View Topic</a>

            </td>
          </tr>
          @endforeach

              </tbody>
            </table>
          </div>
    </div>

</div>



@endsection
