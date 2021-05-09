@extends('frontend.main')
@section('content')


        <div class="row">

            <div class="col-md-10 m-auto bg-warning shadow rounded border mt-5 p-5">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <form method="post" action="{{ route('submitAssignment.create',$assignmentId)}}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="mb-3">
                        <input name="student_name" type="hidden" class="form-control" value={{auth()->user()->std->id}}>
                        </div>
                        <div class="mb-3">
                            <input name="student_name" type="hidden" class="form-control" value={{auth()->user()->studentCourse->id}}>
                        </div> --}}
                    <div class="mb-3">
                    <label  class="form-label fs-5 fw-bolder text-light bg-dark p-1 rounded mb-3">Upload Assingnment</label>
                    <textarea name="upload_assignment" type="text" class="form-control" placeholder="Submit assignment link"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>



@endsection
