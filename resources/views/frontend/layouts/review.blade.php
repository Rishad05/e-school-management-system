@extends('frontend.main')

@section('content')

<form action="submitReview" method="post"  class="container mt-5 w-50 p-5 border shadow p-3 mb-5 bg-warning">
     @csrf
     @if(session()->has('success'))
     <div class="alert alert-success">
         {{ session()->get('success') }}
     </div>
 @endif
    <div class="mb-3 ">
        <h2 class="text-center">WE APPRECIATE YOUR REVIEW!</h2>

<div class="form-group">
  <div class="col-md-12 inputGroupContainer">

  <div class="input-group">
  <input  name="name" placeholder="{{auth()->user()->name}}" class="form-control"  type="text">
    </div>
  </div>
</div>
<br>
  <div class="input-group">

    <input name="email" type="email" class="form-control" placeholder="{{auth()->user()->email}}">
     </div>
  </div>
</div>
 <div class="fw-bolder">Rate our overall services.</div>
  <div class="input-group">

   <select name="rate" class="form-control" id="rate">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    </div>
  </div>
</div>

 <div class="fw-bolder">Write your feedback.</div>
  <div class="input-group">
  <textarea  name="message"  class="form-control" id="review" rows="3"></textarea>
    </div>
  </div>
</div>
<div class="mt-2 justify-content-center">
 <button  type="submit" class="btn btn-success">Submit</button>
</div>
</form>
@endsection
