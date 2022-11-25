@extends('layouts.app')

@section('content')
<section>
  <div class="timeslot-align">
    <div class="timeslotcontainer">
      <h2 class="text-center">
        Update Question
      </h2>
      <form action="/updatequestion-edit/{{$getid->id}}" method="POST" >
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="row">
        <div class="col-md-12">
          <div class="input-group mt-4 mb-2">
            <div class="col-md-2">
              <span class="input-group-text">Question No.</span>
            </div>
            <div class="col-md-10">
              <input type="text" id="question_num" name="question_num" class="form-control" value="{{$getid->question_num}}">
            </div>
          </div>
          <div class="input-group">
            <div class="col-md-2">
              <span class="input-group-text">Question</span>
            </div>
            <div class="col-md-10">
              <input type="bigtext" id="question" name="question" class="form-control" value="{{$getid->question}}">
            </div>
          </div>
        </div>
      </div>
      <br><br><br>
    <center><button type="submit" class="submitbtn">Update</button></center>
    <center><a href="{{ url('questions') }}" ><button type="button" class="submitbtn">Cancel</button></a></center>
    </div>
  </div>
</section>
@endsection