@extends('layouts.app')

@section('content')
<section>
  
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
         <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('viewquestions') }}">Questions</a></li>
             <li><a href="{{ url('viewtime')  }}" >List of Appointments</a></li>
             <li><a href="{{ url('myfinishappointments') }}" class="active">Completed Appointments</a></li>
         </ul>
     </header>
            <div class="examscard">          
                <div class="card-body"> 
                <table class="table table-striped">
                <thead>
<tr>
<td><center>ID Number </center></td>
<td><center> Name </center></td>
<td><center>Date </center></td>
<td><center>Time </center></td>
</tr>
</thead>
<tbody id="dynamic-row">
@foreach($donelist as $d)
<tr>
<td><center><p>{{ $d->user_idnum }} </p></center></td>
<td><center><p>{{ $d->user_fname }}</p></center></td>
<td><center><p>{{ $d->date }}</p></center></td>
<td><center><p>{{ $d->time }}</p></center></td>
</tr>
@endforeach
</tbody>
</table>
@endsection
