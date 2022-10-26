@extends('layouts.app')

@section('content')
<section>
  
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
         <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->fname }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                      </div>
                </li>
                <li><a href="{{ url('viewtime') }}" class="active">Appointments</a></li>
                <li><a href="{{ url('viewquestions') }}">Questions</a></li>
             <li><a href="{{ url('home') }}" >Home</a></li> 
         </ul>
     </header>
     @include('partials.alerts')
      <div class="card-body"> 
      <br><br><br><br>
    <div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1"> Lists</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Accepted</label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Completed</label>
    <div class="tabs">
    
      <div>
      <form method="POST" action="viewtime-accept" >
      @csrf
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
</form>
<button type="submit">Accept</button>
    </td> 
</tr>
@endforeach

</tbody>
</table>
</div>
<div>
<form method="POST" action="viewtime-done" >
  @csrf
      <table class="table table-striped">
      <thead>
<tr>
<td><center>ID Number </center></td>
<td><center> Name </center></td>
<td><center>Date </center></td>
<td><center>Time </center></td>
<td><center>Action </center></td>
</tr>
</thead>
<tbody id="dynamic-row">
@foreach($acceptedlist as $a)
<tr>
<input type="hidden" class="btn_val_id" value="{{ $t->id }}">
<td><center><input type="hidden" name="user_idnum" value="{{ $t->user_idnum }}" ><p>{{ $t->user_idnum }}</p></center></td>
<td><center><input type="hidden" name="user_fname" value="{{ $t->user_fname }} "><p>{{ $t->user_fname }}</p></center></td>
<td><center><input type="hidden" name="date" value="{{ $t->date }} "><p>{{ $t->date }}</p></center></td>
<td><center><input type="hidden" name="time" value="{{ $t->time }} "><p>{{ $t->time }}</p></center></td>
<td>
</form>
<button type="submit">Done</button>
    </td> 
</tr>
@endforeach
</tbody>
</table>
</div>
<div>
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
</div>
@endsection
