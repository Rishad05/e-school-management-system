@extends('backend.Main')
@section('content')

<div class="bg-warning mt-4 p-5 rounded shadow">
    <h1 class="text-light">Enrolling Report</h1>
    <!-- Modal -->

    <div class="bg-warning mt-3 mb-5 pb-5 p-3  rounded shadow ">
        <form action="{{ route('report') }}" method="GET">

            <div class="row mb-3">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label for="from" class="col-sm-2 col-form-label fw-bolder">Date from:</label>
                                <div class="col-sm-10">
                                    <input max="{{date('Y-m-d')}}" id="from" type="date" class="form-control" name="from_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label for="to" class="col-sm-2 col-form-label fw-bolder">Date to:</label>
                                <div class="col-sm-10">
                                    <input max="{{date('Y-m-d')}}" id="to" type="date" class="form-control" name="to_date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <button type="submit" class=" btn  btn-danger text-white fw-bolder mb-2">Search</button>
                    <button onclick="printDiv('printableArea')" class="btn btn-success text-white fw-bolder"><span
                            data-feather="printer"></span>print</button>
                </div>
            </div>
        </form>
    </div>
<div id="printableArea">
  <table class="table  table-sm">
    <thead>
      <tr>
        <th>Serial</th>
        <th>student_name</th>
        <th>course_name</th>
        <th>course_price</th>
        <th>Email</th>
        <th>Bkash Number</th>
        <th>Trans ID</th>
      </tr>
    </thead>
    <tbody>
        @if (count($courseList) > 0)
      @foreach ( $courseList as $key=> $data)

<tr>
  <th scope="row">{{$key+1}}</th>
  <td>{{$data->studentName->name}}</td>
  <td>{{$data->enrollCourse->course_name}}</td>
  <td>{{$data->enrollCourse->course_price}} BDT</td>
  <td>{{$data->studentName->email}}</td>
  <td>{{$data->payment_number}}</td>
  <td>{{$data->trans_id}}</td>


</tr>
@endforeach
@else
                    <tr>
                        <td class="text-center text-danger fw-bolder fs-3" colspan="10">No data found!</td>
                    </tr>
                @endif

    </tbody>
  </table>
</div>
</div>
@endsection
