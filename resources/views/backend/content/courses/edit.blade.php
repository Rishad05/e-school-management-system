@extends('backend.Main')

@section('content')


    <form action="{{route('course.update', $course->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row bg-warning mt-4 p-5 rounded shadow">
            @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
            <div class="col-md-6">
                <div class="form-group">
                    <label class="fw-bolder" for="">Enter Course name:</label>
                    <input value="{{ $course->course_name}}"  name="course_name" type="text" class="form-control" placeholder="Enter Course Name...">
                </div>
                <div class="form-group">
                    <label class="fw-bolder" for="">Enter Course Price:</label>
                    <input value="{{ $course->course_price}}"  name="course_price" type="number" class="form-control" placeholder="Enter Course price...">
                </div>



                <div class="form-group">
                    <label class="fw-bolder" for="">Select Course Author:</label>
                    <select class="form-control" name="author_id" id="">
                        @foreach($author as $data)
                        <option @if ($course->author_id == $data->id) selected @endif value="{{$data->id}}">{{$data->author_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="fw-bolder" for="">Payment No:</label>
                    <input value="{{ $course->payment_number}}"  name="payment_number" type="text" class="form-control" placeholder="Enter Payment No...">
                </div>

                <div class="form-group">
                    <label class="fw-bolder">Image</label>
                    <br>
                    <img style="width: 150px;" class="mb-2" src="{{ url('/files/courses/' . $course->image) }}" alt="">
                    <input name="course_image" type="file" class="form-control" value="{{ $course['course_image'] }}"
                        src="" id="">
                </div>

                <br>
                <button type="submit" class="btn btn-success">Submit</button>


            </div>


        </div>
    </form>



@endsection
