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
                <li><a href="{{ url('category') }}" >Category</a></li>
                <li><a href="{{ url('appointment_history') }}" >Appointments</a></li>
                <li><a href="{{ url('exams_history') }}" class="active">Exam History</a></li>
             <li><a href="{{ url('home') }}">Home</a></li>
         </ul>
     </header>
     <div class="homecardbody"> 
     <div class="examscard">          
                <div class="card-body"> 
                <table class="table table-striped">
               
   <thead>
   <div class="panel-body">
   <tr>
   <th colspan="3"><center><h2>Exams History</h2></center></th>
</tr>
   <tr>
<td><center>Exam Result </center></td>
<td><center>Date & Time</center></td>
<td><center>Action </center></td>
</tr>
  </thead>
  <tbody id="dynamic-row">
  @foreach($myexams as $examhistory)
<tr>

<td><center><p>{{ $examhistory->result_name }}</p></center></td>
<td><center><p>{{ $examhistory->created_at }}<p></center></td>
<td><center>
  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
</center></td> 
</tr>
  @endforeach
  </tbody>

</table>

                    </div>
                </div>
            </div>
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