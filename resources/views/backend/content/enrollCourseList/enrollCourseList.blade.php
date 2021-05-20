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
        <td>
            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        @if ($data->status == 'pending')
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'confirm']) }}">Confirm</a>
                        @elseif ( $data->status == 'confirm')
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'pending']) }}">Pending</a>
                        @else
                            <a class="btn" href="">None</a>
                        @endif
                    </li>

                    {{-- <li class="bg-info"><a class="btn" href="">Edit</span></a></li>
                    <li class="bg-danger"><a class="btn btn-danger" href={{ route('course.delete', $data['id']) }}>Delete</a></li> --}}



                </ul>
            </div>
            <div class="mb-5">

            </div>
        </td>

      </tr>
      @endforeach

          </tbody>
        </table>
      </div>
  @endsection
