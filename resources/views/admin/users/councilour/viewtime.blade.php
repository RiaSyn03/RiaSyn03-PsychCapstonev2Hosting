@extends('layouts.app')

@section('content')
<section>
  
     <header>
     <div class="logo"><img src="{{ asset('img/logo.gif') }}"></div>
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
<input type="hidden" name="status" value="accepted "/>
<input type="hidden" name="counselor_name" value="{{ Auth::user()->fname }} "/>

<td>
</form>
<!-- <button type="button" class="btn btn-success edit">Accept</button>
<button type="button" class="btn btn-danger">Decline</button> -->
@if ($t->status='pending')
  <a href="{{url ('change-status/'.$t->id) }}" class="btn btn-success" onclick="return confirm('Are you sure?')">Accept</a>
  @else
  <a href="{{url ('change-status/'.$t->id) }}" class="btn btn-danger">Pending</a>
  @endif
  <button type="button" class="btn btn-danger">Decline</button>
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
<input type="hidden" class="btn_val_id" value="{{ $a->id }}">
<td><center><input type="hidden" name="user_idnum" value="{{ $a->user_idnum }}" ><p>{{ $a->user_idnum }}</p></center></td>
<td><center><input type="hidden" name="user_fname" value="{{ $a->user_fname }} "><p>{{ $a->user_fname }}</p></center></td>
<td><center><input type="hidden" name="date" value="{{ $a->date }} "><p>{{ $a->date }}</p></center></td>
<td><center><input type="hidden" name="time" value="{{ $a->time }} "><p>{{ $a->time }}</p></center></td>
<td>
</form>
@if ($a->status='accepted')
  <a href="{{url ('change-done/'.$a->id) }}" class="btn btn-success" onclick="return confirm('Are you sure?')">Done</a>
  @else
  <a href="{{url ('change-done/'.$a->id) }}" class="btn btn-danger">Accepted</a>
  @endif
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
<!-- <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable();

            table.on('click','.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#idnum').val(data[1]);
                $('#fname').val(data[3]);
                $('#mname').val(data[4]);
                $('#lname').val(data[2]);
                $('#email').val(data[5]);
                $('#year').val(data[7]);
                $('#course').val(data[6]);
                $('#editForm').attr('action', '/user/'+data[0]);
                $('#editModal').modal('show');

            });
        });
    </script> -->
@endsection
