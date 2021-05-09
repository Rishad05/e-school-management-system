@extends('backend.Main')
@section('content')
<div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
    <h2 class="float-start text-light mb-3">List of Lesson</h2>

    <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Lesson
      </button>

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
        @foreach ($lessonList as $key=> $data)

  <tr>
    <th scope="row">{{$key+1}}</th>

    <td>{{$data->lesson_name}}</td>
    <td>{{$data->studentCourse->course_name}}</td>
    <td>{{$data->description}}</td>
    <td>
        <a class="btn btn-success" href="">Edit </a>
        <a class="btn btn-danger" href="">Delete </a>
    </td>
  </tr>
  @endforeach

      </tbody>
    </table>
  </div>

    <!-- Modal -->
     <form method="post" action="{{route('lesson.create')}}" >
        @csrf

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Lesson</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Lesson Name</label>
                            <input name="lesson_name" type="text" class="form-control"  placeholder="Enter lesson Name">


                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" type="text" class="form-control"  placeholder="Enter description"></textarea>
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


@endsection
