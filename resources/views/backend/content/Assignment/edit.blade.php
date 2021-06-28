@extends('backend.Main')
@section('content')
<form method="post" action={{route('assignment.update', $assignment->id)}}  >
    @csrf
    @method('PUT')
          <div class="bg-warning mt-4 p-5 rounded shadow">
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="fw-bolder">Assignment_Name</label>
                        <input value="{{$assignment->Assignment_Name}}" name="Assignment_Name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Assignment Name">
                    </div>
                    <div class="form-group">
                        <label class="fw-bolder" for="">Select Course:</label>
                        <select class="form-control" name="course_id" id="">
                            @foreach($course as $data)
                            <option @if ($assignment->course_id == $data->id) selected @endif value="{{$data->id}}">{{$data->course_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="fw-bolder">Assignment_Description</label>
                        <textarea value="{{$assignment->Assignment_description}}" name="Assignment_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter description"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
          </div>

  </form>
  @endsection
