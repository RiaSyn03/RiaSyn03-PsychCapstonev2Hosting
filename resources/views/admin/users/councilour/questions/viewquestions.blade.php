@extends('layouts.app')
@section('content')
<title>List of Questions</title>
</head>
<body>
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
                <li><a href="{{ url('viewtime') }}">Appointments</a></li>
                <li><a href="{{ url('viewquestions') }}"class="active">Questions</a></li>
             <li><a href="{{ url('home') }}" >Home</a></li>  
         </ul>
     </header>
     @include('partials.alerts')     
                <div class="card-body"> 
                <br><br><br><br>
                <div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1"> Stress Scale</label>
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
       <div class="wrapper" >
         <h2><div class="title"><center>ADD STRESS SCALE QUESTION</center></div></h2>
         <form action="viewquestions" method="POST">
   @csrf
   <div class="box">
   <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Question Number</span>
                                            <input type="text" id="question_num" name="question_num" placeholder="No." class="form-control">
                                        </div>
                                        </div>
                                  <div class="col-6 col-sm-8">
                                        <div class="input-group mb-9">
                                            <span class="input-group-text">Question</span>
                                            <textarea row="5" cols="80" id="question" name="question" placeholder="Question" class="form-control"></textarea>
                                            
                                        </div>
   <input type="text" id="question_type" name="question_type" value="stress" class="form-control" hidden>
   </div>
   </div>
   <br><br><br>
   <center><button type="submit" class="addquestbtn">Submit</button></center>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         </div>
        </div>
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
       <div class="wrapper" >
         <h2><div class="title"><center>ADD PERSONALITY QUESTION</center></div></h2>
         <form action="viewquestions" method="POST">
   @csrf
   <div class="box">
       <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Question Number</span>
                                            <input type="text" id="question_num" name="question_num" placeholder="No." class="form-control">
                                        </div>
                                        </div>
                                  <div class="col-6 col-sm-8">
                                        <div class="input-group mb-9">
                                            <span class="input-group-text">Question</span>
                                            <textarea row="5" cols="80" id="question" name="question" placeholder="Question" class="form-control"></textarea>
                                            
                                        </div>
   <input type="text" id="question_type" name="question_type" value="personality" class="form-control" hidden>
   </div>
   </div>
   <br><br><br>
   <center><button type="submit" class="addquestbtn">Submit</button></center>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         </div>
        </div>
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
       <div class="wrapper" >
         <h2><div class="title"><center>ADD LEARNER QUESTION</center></div></h2>
         <form action="viewquestions" method="POST">
   @csrf
   <div class="box">
       <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Question Number</span>
                                            <input type="text" id="question_num" name="question_num" placeholder="No." class="form-control">
                                        </div>
                                        </div>
                                  <div class="col-6 col-sm-8">
                                        <div class="input-group mb-9">
                                            <span class="input-group-text">Question</span>
                                            <textarea row="5" cols="80" id="question" name="question" placeholder="Question" class="form-control"></textarea>
                                            
                                        </div>
   <input type="text" id="question_type" name="question_type" value="learners" class="form-control" hidden>
   </div>
   </div>
   <br><br><br>
   <center><button type="submit" class="addquestbtn">Submit</button></center>
 </form>
         
         <div onclick="toggle()"><center>Close</center></div>
         </div>
        </div>
</div>
</div>
</div>

      <div>
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
