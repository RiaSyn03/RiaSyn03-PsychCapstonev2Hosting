@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Appointment History</div>
                <div class="card-body"> 
                <input type="text" id="search"class="form-control" placeholder="search" />
                <table class="table table-striped">
   <thead>
   <div class="panel-body">
   <tr>
<td>ID</td>
<td>ID Number </td>
<td> Name </td>
<td>Date </td>
<td>Time </td>
<td>Action </td>
</tr>
  </thead>
  <tbody id="dynamic-row">
  @foreach($timescheds as $history)
<tr>
<form method="post" action="appointment_history">
  @csrf
    <input type="hidden" class="btn_val_id" value="{{ $history->id }}">
<td><input type="text" name="id" value="{{ $history->id }}" ></td>
<td><input type="text" name="user_idnum" value="{{ $history->user_idnum }}" ></td>
<td><input type="text" name="user_fname" value="{{ $history->user_fname }} "></td>
<td><input type="text" name="date" value="{{ $history->date }} "></td>
<td><input type="text" name="time" value="{{ $history->time }} "></td>
<td>
  <a href="" class="float-left">
  <button type="submit" >Submit</i></button>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
    </td> 
</tr>
  @endforeach
  </tbody>

</table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
<a href="{{ url('home') }}"><button class="complete">Back to menu</button></a>
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