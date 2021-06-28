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
              <th>Bkash Number</th>
              <th>Trans ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $courseList as $key=> $data)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->studentName->name}}</td>
        <td>{{$data->enrollCourse->course_name}}</td>
        <td>{{$data->studentName->email}}</td>
        <td>{{$data->payment_number}}</td>
        <td>{{$data->trans_id}}</td>
        <td>
            @if ($data->status == 'pending')
            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'confirm'])}}">Confirm</a>
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'cancel'])}}">Cancel</a>
                    </li>
                </ul>
            </div>
            <div class="mb-5">
            </div>
            @else
            <a class="btn btn-outline-dark"href="">Order {{$data->status}}</a>
            @endif
        </td>
      </tr>
      @endforeach
          </tbody>
        </table>
      </div>
  @endsection
