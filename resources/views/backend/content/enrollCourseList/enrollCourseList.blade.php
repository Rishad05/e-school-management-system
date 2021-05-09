@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
          <!-- Modal -->

        <table class="table  table-sm">
          <thead>
            <tr>
              <th>Serial</th>
              <th>student_name</th>
              <th>course_name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $courseList as $key=> $data)

      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->studentName->name}}</td>
        <td>{{$data->enrollCourse->course_name}}</td>
        <td>{{$data->studentName->email}}</td>

      </tr>
      @endforeach

          </tbody>
        </table>
      </div>
  @endsection
