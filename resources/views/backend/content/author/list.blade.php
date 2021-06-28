@extends('backend.Main')
@section('content')

      <div class="table-responsive bg-warning mt-4 p-5 rounded shadow">
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
        <h2 class="float-start text-light text-center mb-3">List of Author</h2>
        <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Author
          </button>

          <!-- Modal -->
          <form method="post" action={{route('author.create')}} enctype="multipart/form-data" >
            @csrf

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Author</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-gorup">
                                <label for="">Upload Image</label>
                                <input name="author_image" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author Name</label>
                                <input name="author_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author Email</label>
                                <input name="Author_Email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input name="Contact_No" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter author Name">
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
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Serial</th>
              <th>Author_Name</th>
              <th>Image</th>
              <th>Author_Email</th>
              <th>Contact_No</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($author as $key=> $data)

      <tr>
        <th scope="row">{{$author->firstItem()+$key}}</th>

        <td>
            <img  style="width: 100px; height: 90px" src="{{ url('/files/author/' . $data->image) }}" alt="">
        </td>

        <td>{{$data->author_name}}</td>
        <td>{{$data->Author_Email}}</td>
        <td>{{$data->Contact_No}}</td>
        <td>
            <a class="btn btn-success" href="{{route('author.edit', $data['id'])}}">Edit </a>
            <a class="btn btn-danger" href="{{route('author.delete', $data['id'])}}">Delete </a>
        </td>
      </tr>
      @endforeach

          </tbody>
        </table>
        {{$author->links()}}
      </div>
  @endsection
