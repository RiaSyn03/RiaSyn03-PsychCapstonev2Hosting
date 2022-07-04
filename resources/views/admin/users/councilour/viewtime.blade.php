@extends('layouts.app')

@section('content')
<section>
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
         <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('viewquestions') }}">Questions</a></li>
             <li><a href="{{ url('viewtime')  }}" class="active">List of Appointments</a></li>
             <li><a href="{{ url('#') }}">My Appointments</a></li>
         </ul>
     </header>
            <div class="examscard">          
                <div class="card-body"> 
                <table class="table table-striped">
<tr>
<td>ID Number </td>
<td> Name </td>
<td>Date </td>
<td>Time </td>
<td>Action </td>
</tr>
</thead>
<tbody id="dynamic-row">
@foreach($timescheds as $t)
<tr>
<form method="post" action="listofapprovedappointments" >
  @csrf
<input type="hidden" class="btn_val_id" value="{{ $t->id }}">
<td><input type="text" name="user_idnum" value="{{ $t->user_idnum }}" ></td>
<td><input type="text" name="user_fname" value="{{ $t->user_fname }} "></td>
<td><input type="text" name="date" value="{{ $t->date }} "></td>
<td><input type="text" name="time" value="{{ $t->time }} "></td>
<td>
  <a href="" class="float-left">
  <button type="submit" >Accept</i></button>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
    </td> 
</tr>
@endforeach
</tbody>
</table>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $('.btn-sm').click(function (e){
    e.preventDefault();
var delete_id = $(this).closest("tr").find('.btn_val_id').val();
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})
swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    var data = {
      "_token": $('input[name=_token]').val(),
      "id": delete_id,
    };
    $.ajax({
      type: "DELETE",
      url: '/appointment-delete/'+delete_id,
      data: data,
      success: function (response) {
        swalWithBootstrapButtons.fire(
          response.status,
    )
    .then((result) => {
      location.reload();
    });
      }
    });
    
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
   });
});
</script>
@endsection
