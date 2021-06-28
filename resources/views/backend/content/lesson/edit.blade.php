@extends('backend.Main')
@section('content')
    <form action="{{route('lesson.update', $lessonList->id)}}" method="post">
        @csrf
        @method('PUT')
              <div class="bg-warning mt-4 p-5 rounded shadow">

                  <div class="modal-body">
                      <div class="modal-body">
                          <div class="form-group">
                              <label class="fw-bolder">Lesson Name</label>
                              <input  value="{{ $lessonList->lesson_name}}" name="lesson_name" type="text" class="form-control"  placeholder="Enter lesson Name">
                          </div>
                          <div class="form-group">
                            <label class="fw-bolder" for="">Select Course:</label>
                            <select class="form-control" name="course_id" id="">
                                @foreach($course as $data)
                                <option @if ($lessonList->course_id == $data->id) selected @endif value="{{$data->id}}">{{$data->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                              <label class="fw-bolder">Description</label>
                              <textarea value="{{ $lessonList->description}}" name="description" type="text" class="form-control"  placeholder="Enter description"></textarea>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                  </div>
              </div>
    </form>
@endsection
