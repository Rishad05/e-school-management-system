@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
          <!-- Modal -->

        <table class="table  table-sm">
          <thead>
            <tr>
              <th>Serial</th>
                <th>Student_name</th>
              <th>course_name</th>
              <th>Assignment List</th>

            </tr>
          </thead>
          <tbody>
            @foreach ( $AssignmentList as $key=> $data)

      <tr>
        <th scope="row">{{$key+1}}</th>

        <td>{{$data->studentName->name}}</td>

        <td>{{$data->studentCourse->course_name}}</td>
        <td>{{$data->upload_assignment}}</td>


      </tr>
      @endforeach

          </tbody>
        </table>
      </div>
  @endsection
