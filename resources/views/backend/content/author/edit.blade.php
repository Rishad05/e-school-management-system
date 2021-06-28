@extends('backend.Main')
@section('content')
<form method="post" action={{route('author.update', $author->id)}} enctype="multipart/form-data" >
    @csrf
    @method('PUT')

          <div class="bg-warning mt-4 p-5 rounded shadow">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="fw-bolder">Image</label>
                        <br>
                        <img style="width: 150px;" class="mb-2" src="{{ url('/files/author/' . $author->image) }}" alt="">
                        <input name="author_image" type="file" class="form-control" value="{{ $author['author_image'] }}"
                            src="" id="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input value="{{$author->author_name}}" name="author_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Email</label>
                        <input value="{{ $author->Author_Email}}" name="Author_Email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input value="{{ $author->Contact_No}}" name="Contact_No" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Contact Number">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

          </div>

  </form>
  @endsection
