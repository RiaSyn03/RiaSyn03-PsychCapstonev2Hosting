@extends('layouts.app')
@section('content')
<title>List of Questions</title>
</head>
<body>
<form action="viewquestions" method="POST">
  @csrf
  <label>Number
  <input id="question_num" class="form-control" name="question_num"></label>
  <br>
  <label>Question</label>
  <input id="question" type="text" class="form-control" name="question">
  <label class="custom-select">
    Question Type
    <select name="question_type">
      <option value="stress">Stress</option>
      <option value="learners">Learners</option>
      <option value="personality">Personality</option>
    </select>
  </label>
  <button type="submit">Submit</button>
</form>
<table border = "1">
<tr>
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
<td>Action</td>
</tr>
@foreach ($questions as $question)
@csrf
<form method="post" action="viewquestions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $question->id }}">
<td>{{ $question->question_num }}</td>
<td>{{ $question->question}}</td>
<td>{{ $question->question_type }}</td>
<td>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>
@endforeach
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
      url: '/question-delete/'+delete_id,
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
