@extends('backend.Main')

@section('content')


    <form action="{{route('course.update', $course->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Enter Course name:</label>
                    <input value="{{ $course->course_name}}"  name="course_name" type="text" class="form-control" placeholder="Enter Course Name...">
                </div>

                <div class="form-group">
                    <label for="">Enter Course Price:</label>
                    <input value="{{ $course->course_price}}"  name="course_price" type="number" class="form-control" placeholder="Enter Course price...">
                </div>



                <div class="form-group">
                    <label for="">Select Course Author:</label>
                    <select class="form-control" name="author_id" id="">
                        @foreach($author as $data)
                        <option @if ($course->author_id == $data->id) selected @endif value="{{$data->id}}">{{$data->author_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Upload Image</label>
                    <input name="course_image" type="file" class="form-control">
                </div>

                <br>
                <button type="submit" class="btn btn-success">Submit</button>


            </div>


        </div>
    </form>



@endsection
