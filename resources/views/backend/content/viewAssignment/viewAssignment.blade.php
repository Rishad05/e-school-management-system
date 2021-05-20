@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Serial</th>
              <th>Assignment_Name</th>
              <th>Course_Name</th>
              <th>Assignment_description</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($viewAssignment as $key=> $data)

      <tr>
        <th scope="row">{{$key+1}}</th>

        {{-- <td>
            <img style="width: 100px;" src="{{ url('/files/author/' . $data->image) }}" alt="">
        </td> --}}

        <td>{{$data->Assignment_Name}}</td>
        <td>{{$data->studentCourse->course_name}}</td>
        <td>{{$data->Assignment_description}}</td>
      </tr>
      @endforeach

          </tbody>
        </table>
      </div>
  @endsection
