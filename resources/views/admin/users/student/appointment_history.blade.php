@extends('layouts.app')

@section('content')
<section>
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
             <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('exams_history') }}">Exam History</a></li>
             <li><a href="{{ url('stdntappointment') }}">Appointment</a></li>
             <li><a href="{{ url('appointment_history') }}"class="active">Appointment History</a></li>
         </ul>
     </header>
            <div class="examscard">          
                <div class="card-body"> 
                <table class="table table-striped">
   <thead>
   <div class="panel-body">
   <tr>
<td>ID Number </td>
<td> Name </td>
<td>Date </td>
<td>Time </td>
<td>Action </td>
</tr>
  </thead>
  <tbody id="dynamic-row">
  @foreach($mylist as $history)
<tr>
<form method="post" action="appointment_history">
  @csrf
    <input type="hidden" class="btn_val_id" value="{{ $history->id }}">

<td><input type="text" readonly="readonly" name="user_idnum" value="{{ $history->user_idnum }}" ></td>
<td><input type="text" readonly="readonly" name="user_fname" value="{{ $history->user_fname }} "></td>
<td><input type="text" readonly="readonly" name="date" value="{{ $history->date }} "></td>
<td><input type="text" readonly="readonly" name="time" value="{{ $history->time }} "></td>
<td>
  <a href="" class="float-left">
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
    </td> 
</tr>
  @endforeach
  </tbody>
</table>
                    </div>
                </div>
<script type="text/javascript">
$('body').on('keyup', '#search', function(){
    var searchQuest = $(this).val();

    $.ajax({
            method:'POST',
            url:"{{route ('admin.users.index.action') }}",
            dataType:'json',
            data: {
                '_token': '{{ csrf_token() }}',
                searchQuest: searchQuest,
            },
            success:function(res){
                var tableRow = '';
                $('#dynamic-row').html('');

                $.each(res, function(index, value){
                    tableRow = '<td>'+value.idnum+'</td><td>'+value.lname+'</td><td>'+value.fname+'</td><td>'+value.course+'</td><td>'+value.year+'</td><td>'+value.email+'</td><td>'+value.roles+'</td>><td>'+value.action+'</td></tr>';
                    $('#dynamic-row').append(tableRow);
                });
            }
        });
    });
 </script>
@endsection