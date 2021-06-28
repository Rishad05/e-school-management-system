@extends('backend.Main')
@section('content')


      <div class=" bg-warning mt-4 p-5 rounded shadow ">
        @if (session()->has('success'))
        <div class="alert alert-success d-flex justify-content-between">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @if (session()->has('error-message'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{ session()->get('error-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
<!-- Button trigger modal -->
<h2 class="float-start text-light text-center border-buttom ">List Of Courses</h2>
<button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Courses
  </button>

  <!-- Modal -->
  <form method="post" action={{route('course.create')}} enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-gorup">
                        <label for="">Upload Image</label>
                        <input name="course_image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Name</label>
                        <input name="course_name" type="string" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name">

                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                        <select class="form-select" name="author_id">
                            <option selected>Open this select menu</option>
                            @foreach ($author as $data)
                                <option value="{{$data->id}}">{{$data->author_name}}</option>
                            @endforeach

                          </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Course Price</label>
                        <input name="course_price" type="number" class="form-control" id="exampleInputDescription" placeholder="Enter Course Price">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Payment No</label>
                        <input name="payment_number" type="text" class="form-control" id="exampleInputDescription" placeholder="Enter Payment Number" required>

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
        <table class="table  table-sm pb-5">
          <thead>
            <tr>
              <th>Course_Id</th>
              <th>Image</th>
              <th>Name</th>
              <th>Author</th>
              <th>Price</th>
              <th>Payment No</th>
              <th>Action</th>
            </tr>
          </thead>
        @foreach ($course as $key=> $data)

      <tr>
        <th scope="row">{{$course->firstItem()+$key}}</th>
        <td>
            <img style="width: 100px; height: 90px" src="{{ url('/files/courses/' . $data->image) }}" alt="">
        </td>
        <td>{{$data->course_name}}</td>
        <td>{{$data->courseAuthor->author_name}}</td>
        <td>{{$data->course_price}}</td>
        <td>{{$data->payment_number}}</td>
        <td>
            <a class="btn btn-info" href="{{route('viewLesson', $data['id'])}}">view lesson </a>
            <a class="btn btn-info" href="{{route('viewAssignment', $data['id'])}}">View Assignment </a>
        </td>
        <td>

            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        @if ($data->status == 'Published')
                            <a class="btn" href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'Unpublished']) }}">Make Unpublished</a>
                        @elseif ( $data->status == 'Unpublished')
                            <a class="btn" href="{{ route('completedUpdate', ['id' => $data->id, 'status' => 'Published']) }}">Make Published</a>
                        @else
                            <a class="btn" href="">None</a>
                        @endif
                    </li>

                    <li class="bg-info"><a class="btn" href="{{route('course.edit', $data['id'])}}">Edit</span></a></li>
                    <li class="bg-danger"><a class="btn btn-danger" href={{ route('course.delete', $data['id']) }}>Delete</a></li>



                </ul>
            </div>


        </td>

      </tr>
      @endforeach

    </tbody>

        </table>
        {{$course->links()}}
        <div class="p-5"></div>

      </div>
@endsection
