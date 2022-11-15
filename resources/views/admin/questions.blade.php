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
                <li><a href="{{ url('course') }}">Manage Course</a></li>
                <li><a href="{{ url('questions') }}" class="active">Manage Questions</a></li>
                <li><a href="{{ url('user') }}" >Manage Account</a></li>
                <li><a href="{{ route('home') }} "  >Dashboard</a></li>
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
      <table class="table table-striped" id="questiondatatable">
<thead>
<tr>
   <th colspan="4"><center><h2>STRESS</h2></center></th>
</tr>
<tr>
<!-- <td>Question ID</td> -->
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
<td>Action</td>
</tr>
</thead>
@foreach ($stressquestions as $stress)
<form method="post" action="questions" >
@csrf
<tr>
<!-- <td>{{ $stress->id }}</td> -->
<input type="hidden" class="btn_val_id" value="{{ $stress->id }}">
<td>{{ $stress->question_num }}</td>
<td>{{ $stress->question}}</td>
<td>{{ $stress->question_type }}</td>
<td>
</form>

<!-- Edit Question Modal -->
<!-- <button type="button" id="editquestionModal" onclick="toggle()" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#EditQuestionModal"><i class="fa fa-edit"></i></button>  
<div class="p-2">
       <div id="editpopup">
       <div class="wrapper" >
         <h2><div class="title"><center>ADD STRESS SCALE QUESTION</center></div></h2>
         <form action="questions" method="POST" id="editquestionForm">
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
</div> -->
<!-- End of Edit Modal -->
<button type="button" class="btn btn-success btn-sm "><i class="fa fa-edit"></i></button>   
  <button type="button" class="btn btn-danger btn-sm del"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>

@endforeach
</table>

<!-- Add Modal -->
<button type="button" onclick="toggle()" class="btn btn-success">Add Question</button>
<div class="p-2">
       <div id="popup">
       <div class="wrapper" >
         <h2><div class="title"><center>ADD STRESS SCALE QUESTION</center></div></h2>
         <form action="questions" method="POST">
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

<!-- End of Modal -->
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
<form method="post" action="questions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $personality->id }}">
<td><p>{{ $personality->question_num }}</p></td>
<td><p>{{ $personality->question}}</p></td>
<td><p>{{ $personality->question_type }}</p></td>
<td>
</form>
<button type="button" class="btn btn-success btn-sm "><i class="fa fa-edit"></i></button> 
  <button type="button" class="btn btn-danger btn-sm del"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>
@endforeach
</table>
<button type="button" onclick="toggle()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddPersonalityModal">Add Question</button>
<div class="p-2">
       <div id="popup2">
       <div class="wrapper" >
         <h2><div class="title"><center>ADD PERSONALITY QUESTION</center></div></h2>
         <form action="questions" method="POST">
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
<form method="post" action="questions" >
<tr>
<input type="hidden" class="btn_val_id" value="{{ $learner->id }}">
<td><p>{{ $learner->question_num }}</p></td>
<td><p>{{ $learner->question}}</p></td>
<td><p>{{ $learner->question_type }}</p></td>
<td>
</form>
<button type="button" class="btn btn-success btn-sm "><i class="fa fa-edit"></i></button> 
  <button type="button" class="btn btn-danger btn-sm del"><i class="fa fa-trash-o"></i></button>     
  </td>
</tr>
@endforeach
</table>
<button type="button" onclick="toggle()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddLearnerModal">Add Question</button>
<div class="p-2">
       <div id="popup3">
       <div class="wrapper" >
         <h2><div class="title"><center>ADD LEARNER QUESTION</center></div></h2>
         <form action="questions" method="POST">
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
  $('.del').click(function (e){
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
    var editpopup = document.getElementById('editpopup');
    editpopup.classList.toggle('active');
    
}
  </script>
  <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#questiondatatable').DataTable();

            table.on('click','.edit', function() {

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#question_num').val(data[1]);
                $('#question').val(data[2]);
                $('#editquestionForm').attr('action', '/viewquestion/'+data[0]);
              

            });
        });
    </script> -->


@endsection
