@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">


          <!-- Modal -->
          {{-- <form method="post" action={{route('assignment.create')}}  >
            @csrf

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Assignment</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">
                        <div class="modal-body">
                            {{-- <div class="form-gorup">
                                <label for="">Upload Image</label>
                                <input name="author_image" type="file" class="form-control">
                            </div> --}}
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Serial</th>
              <th>Assignment_Name</th>
              <th>Course_Name</th>
              <th>Assignment_description</th>
              <th>Action</th>
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
