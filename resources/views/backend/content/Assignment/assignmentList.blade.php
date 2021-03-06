@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
        <h2 class="float-start text-light text-center mb-3">List of Assignment</h2>
        <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Assignment
          </button>

          <!-- Modal -->
          <form method="post" action={{route('assignment.create')}}  >
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Assignment_Name</label>
                                <input name="Assignment_Name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Assignment Name">
                            </div>
                            <div>
                                <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                                <select class="form-select" name="course_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($course as $data)
                                        <option value="{{$data->id}}">{{$data->course_name}}</option>
                                    @endforeach

                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Assignment_Description</label>
                                <textarea name="Assignment_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
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
            @foreach ($assignment as $key=> $data)

      <tr>
        <th scope="row">{{$assignment->firstItem()+$key}}</th>

        {{-- <td>
            <img style="width: 100px;" src="{{ url('/files/author/' . $data->image) }}" alt="">
        </td> --}}

        <td>{{$data->Assignment_Name}}</td>
        <td>{{$data->studentCourse->course_name}}</td>
        <td>{{$data->Assignment_description}}</td>
        <td>
            <a class="btn btn-success" href="{{route('assignment.edit', $data['id']) }}">Edit </a>
            <a class="btn btn-danger" href=" {{route('assignment.delete', $data['id'])}} ">Delete </a>
        </td>
      </tr>
      @endforeach

          </tbody>
        </table>
        {{$assignment->links()}}
      </div>
  @endsection
