@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
          <!-- Modal -->

        <table class="table  table-sm">
          <thead>
            <tr>
              <th>Serial</th>
              <th>Student_image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($studentList as $key=> $data)

      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>
            <img style="width: 100px;" src="{{ url('/files/student/' . $data->image) }}" alt="">
        </td>
        <td>{{$data->studentInfo->name}}</td>
        <td>{{$data->studentInfo->email}}</td>
        <td>
            <a class="btn btn-success" href="">Edit </a>
            <a class="btn btn-danger" href="">Delete </a>
        </td>
      </tr>
      @endforeach

          </tbody>
        </table>
      </div>
  @endsection
