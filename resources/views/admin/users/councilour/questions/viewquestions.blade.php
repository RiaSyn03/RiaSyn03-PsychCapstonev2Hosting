@extends('layouts.app')
@section('content')
<title>List of Questions</title>
</head>
<body>
<section>
     <header>
     <div class="logo">Logo</div>
         <ul>
         <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('viewquestions') }}"class="active">Questions</a></li>
             <li><a href="{{ url('viewtime') }}" >List of Appointments</a></li>
             <li><a href="{{ url('myfinishappointments') }}">Completed Appointments</a></li>
         </ul>
     </header>
     @include('partials.alerts')     
                <div class="card-body"> 
                <div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Stress Scale</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Personality</label>
    
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Learners</label>
    <div class="tabs">
      <div>
      <table class="table table-striped">
<thead>
<tr>
   <th colspan="4"><center><h2>STRESS</h2></center></th>
</tr>
<tr>
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
<td>Action</td>
</tr>
</thead>
@foreach ($stressquestions as $stress)
@csrf
<form method="post" action="viewquestions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $stress->id }}">
<td><p>{{ $stress->question_num }}</p></td>
<td><p>{{ $stress->question}}</p></td>
<td><center><p>{{ $stress->question_type }}</p></center></td>
<td>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>

@endforeach
</table>
<button type="button" onclick="toggle()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddAccountModal">Add Question</button>
<div class="p-2">
       <div id="popup">
         <h2><div><center>Add Question Here</center></div></h2>
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
     </select>
   </label>
   <button type="submit">Submit</button>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         
</div>
</div>
</div>
      <div>
      <table class="table table-striped">
<thead>
<tr>
   <th colspan="4"><center><h2>PERSONALITY</h2></center></th>
</tr>
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
<td>Action</td>
</tr>
</thead>
@foreach ($personalityquestions as $personality)
@csrf
<form method="post" action="viewquestions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $personality->id }}">
<td><p>{{ $personality->question_num }}</p></td>
<td><p>{{ $personality->question}}</p></td>
<td><p>{{ $personality->question_type }}</p></td>
<td>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>

@endforeach
</table>
<button type="button" onclick="toggle()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddAccountModal">Add Question</button>
<div class="p-2">
       <div id="popup2">
         <h2><div><center>Add Question Here</center></div></h2>
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
       <option value="personality">Personality</option>
     </select>
   </label>
   <button type="submit">Submit</button>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         
</div>
</div>
</div>

      <div>
      <table class="table table-striped">
<thead>
<tr>
   <th colspan="4"><center><h2>LEARNERS</h2></center></th>
</tr>
<tr>
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
<td>Action</td>
</tr>
</thead>
@foreach ($learnersquestions as $learner)
@csrf
<form method="post" action="viewquestions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $learner->id }}">
<td><p>{{ $learner->question_num }}</p></td>
<td><p>{{ $learner->question}}</p></td>
<td><p>{{ $learner->question_type }}</p></td>
<td>
</form>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>
@endforeach
</table>
<button type="button" onclick="toggle()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddAccountModal">Add Question</button>
<div class="p-2">
       <div id="popup3">
         <h2><div><center>Add Question Here</center></div></h2>
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
       <option value="learners">Learners</option>
     </select>
   </label>
   <button type="submit">Submit</button>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         
</div>
</div>
</div>
    </div>
  </div>
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
<script>
  function toggle(){
    
   
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
    var popup2 = document.getElementById('popup2');
    popup2.classList.toggle('active');
    var popup3 = document.getElementById('popup3');
    popup3.classList.toggle('active');
    
}
  </script>
@endsection
