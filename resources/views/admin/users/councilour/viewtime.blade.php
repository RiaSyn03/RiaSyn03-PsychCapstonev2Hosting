@extends('layouts.app')

@section('content')
<section>
  
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
         <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('viewquestions') }}">Questions</a></li>
             <li><a href="{{ url('viewtime')  }}" class="active">List of Appointments</a></li>
             <li><a href="{{ url('myfinishappointments') }}">Completed Appointments</a></li>
         </ul>
     </header>
     <form method="POST" action="viewtime" >
      @csrf
            <div class="examscard">          
                <div class="card-body"> 
                <table class="table table-striped">
<thead>
<tr>

<td><center>ID Number </center></td>
<td> <center>Name</center> </td>
<td><center>Date</center> </td>
<td><center>Time </center></td>
<td><center>Action </center></td>

</tr>
</thead>
<tbody id="dynamic-row">

@foreach($timescheds as $t)
<tr>
<input type="hidden" class="btn_val_id" value="{{ $t->id }}">
<td><center><input type="hidden" name="user_idnum" value="{{ $t->user_idnum }}" ><p>{{ $t->user_idnum }}</p></center></td>
<td><center><input type="hidden" name="user_fname" value="{{ $t->user_fname }} "><p>{{ $t->user_fname }}</p></center></td>
<td><center><input type="hidden" name="date" value="{{ $t->date }} "><p>{{ $t->date }}</p></center></td>
<td><center><input type="hidden" name="time" value="{{ $t->time }} "><p>{{ $t->time }}</p></center></td>
<td>
  @if ($t->status==1)
  <a href="{{url ('change-status/'.$t->id) }}" class="btn btn-success">Accepted</a>
  @else
  <a href="{{url ('change-status/'.$t->id) }}" class="btn btn-danger">Pending</a>
  @endif
</form>
<button type="submit">Done</button>
    </td> 
</tr>
@endforeach

</tbody>
</table>
@endsection
