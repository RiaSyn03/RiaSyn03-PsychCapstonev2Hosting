@extends('layouts.app')

@section('content')
<section>
  <div class="timeslot-align">
    <div class="timeslotcontainer">
      <h2 class="text-center">
        Send Email and Reschedule
      </h2>
      <form action="/reschedule-status/{{$getid->id}}" method="POST" >
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="row">
        <div class="col-md-11">
          <div class="input-group mt-4 mb-2">
            <div class="col-md-2">
              <span class="input-group-text">Email</span>
            </div>
            <div class="col-md-10">
              <input type="text" id="email" name="email" class="form-control" value="{{$getid->user_email}}">
            </div>
          </div>
          <div class="input-group">
            <div class="col-md-2">
              <span class="input-group-text">Message</span>
            </div>
            <div class="col-md-10">
              <textarea type="text" id="body" name="body" rows="5" class="col-md-12"></textarea>
            </div>
            <div class="col-8 col-sm-8">
            <input type="text" id="subject" name="subject" value="FOR RESCHEDULE" class="form-control" hidden>
            </div>
          </div>
        </div>
      </div>
      <br><br><br>
    <center><button type="submit" class="submitbtn">Submit</button></center>
    <center><a href="{{ url('viewtime') }}" ><button type="button" class="submitbtn">Cancel</button></a></center>
    </div>
  </div>
</section>
@endsection