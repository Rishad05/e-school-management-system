@extends('frontend.main')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

  <div class="container">

  <div class="row ">
    <div class="col-md-8 order-md-1">
        @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
      <h4 class="mb-3 mt-5">Enroll</h4>

      <form  action={{route('confirmBuyCourse')}} method="post">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="firstName">Name</label>
            <input type="text" name="name" class="form-control" id="firstName" placeholder="" value="{{auth()->user()->name}}" required>

          </div>

        </div>


        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control" id="email" placeholder="">
        </div>
        <input type="hidden" name="course_id" value={{$course->id}}>




        <h4 class="mb-3">Payment</h4>


        <div class="d-flex mb-5 me-3 ">
                <div class="totals-item totals-item-total">
                  <label>Price:</label>
                  <span class="" id="cart-total">{{$course->course_price}}</span>
                </div>

            </div>
            <div class="mb-3">
                <label for="email">Your Bkash Number </label>
                <input type="text"  name="payment_number" class="form-control" id="email" placeholder=" Enter Your Bkash Number" required>
              </div>
            <div class="mb-3">
                <label for="email">Transaction ID</label>
                <input type="text"  name="trans_id" class="form-control" id="email" placeholder=" Enter Trans ID" required>
              </div>
        <button  class="btn btn-primary btn-lg btn-block" type="submit">Confirm Order</button>

      </form>
    </div>
  </div>


</div>




 @endsection
