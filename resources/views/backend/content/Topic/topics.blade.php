@extends('backend.Main')
@section('content')


<div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
    <h2 class="float-start text-light mb-3">List of Topic</h2>

    <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Topic
      </button>

    <table class="table  table-sm">
      <thead>
        <tr>
          <th>Topic_Id</th>
          <th>Topic_Title</th>
            <th>File</th>
          <th>Lesson_Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($topicList as $key=> $data)

  <tr>
    <th scope="row">{{$key+1}}</th>


    <td>{{$data->topic_title}}</td>
    <td>
        <video width="200px" controls>
             <source src="{{ url('/files/topic/' . $data->file) }}" type="video/mp4"/>
        <source src="{{ url('/files/topic/' . $data->file) }}"/>
        </video>
        {{-- <video style="width: 100px;" src="{{ url('/files/topic/' . $data->file) }}" alt=""></video> --}}
    </td>
    <td>{{$data->courseLesson->lesson_name}}</td>

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
     <form method="post" action="{{route('topic.create')}}" enctype="multipart/form-data" >
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
                            <label for="exampleInputEmail1">Topic Title</label>
                            <input name="topic_title" type="text" class="form-control"  placeholder="Enter topic title">


                        </div>
                        <div class="form-gorup">
                            <label for="">Upload file</label>
                            <input name="topic_file" type="file" class="form-control">
                        </div>
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Lesson Name</label>
                            <select class="form-select" name="lesson_id">
                                <option selected>Open this select menu</option>
                                @foreach ($lesson as $data)
                                    <option value="{{$data->id}}">{{$data->lesson_name}}</option>
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
