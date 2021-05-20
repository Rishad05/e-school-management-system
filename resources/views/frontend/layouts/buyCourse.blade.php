<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
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
            <div class="invalid-feedback">

            </div>
          </div>

        </div>


        <div class="mb-3">
          <label for="email">Email </label>
          <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control" id="email" placeholder="">
          <div class="invalid-feedback">

          </div>
        </div>
        <input type="hidden" name="course_id" value={{$course->id}}>




        <h4 class="mb-3">Payment</h4>


        <div class="d-flex mb-5 ">
                <div class="totals-item totals-item-total">
                  <label>Price:</label>
                  <span class="" id="cart-total">{{$course->course_price}}</span>
                </div>
            </div>
        <button  class="btn btn-primary btn-lg btn-block" type="submit">Confirm Order</button>

      </form>
    </div>
  </div>


</div>




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
