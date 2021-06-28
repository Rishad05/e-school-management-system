@extends('frontend.main')
@section('content')


        <div class="row" style="height:400px";>
            <div class="col-md-10 m-auto bg-warning shadow rounded border mt-5 p-5">
                <form method="post" action="{{ route('submitAssignment.create',$assignmentId)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    <label  class="fw-bolder pb-3"> Submit Assingnment:</label>
                    <textarea name="upload_assignment" type="text" class="form-control" placeholder="Submit assignment link"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>



@endsection
