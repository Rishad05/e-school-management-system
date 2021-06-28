@extends('backend.Main')
@section('content')
<form method="post" action="{{route('topic.update', $topic->id)}}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')

          <div class="bg-warning mt-4 p-5 rounded shadow">
            <div class="modal-body">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="fw-bolder">Topic Title</label>
                        <input value="{{ $topic->topic_title}}"  name="topic_title" type="text" class="form-control"  placeholder="Enter topic title">
                    </div>
                    <div class="form-group">
                        <label class="fw-bolder">Image</label>
                        <br>
                        <video width="200px" controls> <source src="{{ url('/files/topic/' . $topic->file) }}" type="video/mp4"></video>
                        <input name="topic_file" type="file" class="form-control" value="{{ $topic['topic_file'] }}"
                            src="" id="">
                    </div>

                    <div class="form-group">
                        <label class="fw-bolder" for="">Select Course Lesson:</label>
                        <select class="form-control" name="lesson_id" id="">
                            @foreach($lesson as $data)
                            <option @if ($topic->lesson_id == $data->id) selected @endif value="{{$data->id}}">{{$data->lesson_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
          </div>
  </form>
@endsection
