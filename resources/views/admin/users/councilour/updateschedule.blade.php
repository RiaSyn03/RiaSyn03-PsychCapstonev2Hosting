@extends('layouts.app')

@section('content')
<section>
<div class="timeslot-align">
<div class="timeslotcontainer" >
<center>  <h2>Update Time</h2></center>
  <form method="POST" action="/updateschedule-edit/{{$getid->id}}">
  {{ csrf_field() }}
{{ method_field('PUT' )}}
<br><br><br><br><br><br>
<div class="row">
<div class="col-8 col-sm-6">
                                 <div class="input-group mb-3">
                                     <span class="input-group-text">Date</span>
                                     <input type="date" id="date" name="date" class="form-control">
                                 </div>
                                 </div></div>
                                 <div class="col-8 col-sm-8">
                                 <div class="input-group mb-3">
                                <span class="input-group-text">Time
        <select name="time">
        <!-- <optgroup>Morning</optgroup> -->
      <option value="9:00-10:00 AM">9:00-10:00 AM</option>
      <option value="10:00-11:00 AM">10:00-11:00 AM</option>
      <option value="11:00-12:00 PM">11:00-12:00 PM</option>
      <!-- <optgroup>Afternoon</optgroup> -->
      <option value="1:00-2:00 PM">1:00-2:00 PM</option>
      <option value="2:00-3:00 PM">2:00-3:00 PM</option>
      <option value="3:00-4:00 PM">3:00-4:00 PM</option>
    </select></span>
    <div class="input-group mb-3">
                                            <input type="text" id="status" name="status" value="accepted" class="form-control" hidden>
                                        </div>
</div></div>
<br><br><br>
<center><button type="submit" class="submitbtn">Update</button></center>
<center><a href="{{ url('viewtime') }}" ><button type="button" class="submitbtn">Cancel</button></a></center>
</form>
  </div>
</section>
@endsection