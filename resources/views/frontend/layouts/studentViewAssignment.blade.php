@extends('frontend.Main')
@section('content')

     <div class="row" style="height:400px";>

         <div class="col-md-10 m-auto">
            <div class="bg-warning mt-4 p-5 rounded shadow">

                @if (session()->has('error-message'))
                <div class="alert alert-danger d-flex justify-content-between">
                    {{ session()->get('error-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="row m-auto" >
                    <div class="col-md-10">
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
                              @foreach ($courses as $key=> $data)

                        <tr>
                          <th scope="row">{{$key+1}}</th>



                          <td>{{$data->Assignment_Name}}</td>
                          <td>{{$data->studentCourse->course_name}}</td>
                          <td>{{$data->Assignment_description}}</td>
                          <td>
                              <a href="{{route('submitAssignment', $data->id)}}" class="btn btn-danger">Submit Assignment</a>
                          </td>
                        </tr>
                        @endforeach

                            </tbody>
                          </table>
                    </div>
                   </div>


</div>
         </div>
     </div>
  @endsection
