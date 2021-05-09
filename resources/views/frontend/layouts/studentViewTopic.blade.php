@extends('frontend.Main')
@section('content')


<div class="row">
    <div class="col-md-10 m-auto">
        <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">

            <table class="table  table-sm">
              <thead>
                <tr>
                  <th>Topic_Id</th>
                  <th>Topic_Title</th>
                <th>File</th>
                  <th>Lesson_Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courseTopic as $key=> $data)


          <tr>
            <th scope="row">{{$key+1}}</th>


            <td>{{$data->topic_title}}</td>
            <td>
                <video width="200px" controls>
                     <source src="{{ url('/files/topic/' . $data->file) }}" type="video/mp4"/>
                <source src="{{ url('/files/topic/' . $data->file) }}"/>
                </video>
            </td>
            <td>{{$data->courseLesson->lesson_name}}</td>
          </tr>
          @endforeach

              </tbody>
            </table>
          </div>
    </div>
</div>

    <!-- Modal -->

@endsection
