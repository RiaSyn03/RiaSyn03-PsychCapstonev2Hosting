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
      <table class="table table-striped" id="questiondatatable">
<thead>
<tr>
   <th colspan="4"><center><h2>STRESS</h2></center></th>
</tr>
<tr>
<td>Question No.</td>
<td>Question</td>
<td>Type of Question</td>
</tr>
</thead>
@foreach ($stressquestions as $stress)
@csrf
<tr>
<td>{{ $stress->question_num }}</td>
<td>{{ $stress->question}}</td>
<td>{{ $stress->question_type }}</td>
</tr>
@endforeach
</table>
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
</tr>
</thead>
@foreach ($personalityquestions as $personality)
@csrf
<tr>
<input type="hidden" class="btn_val_id" value="{{ $personality->id }}">
<td><p>{{ $personality->question_num }}</p></td>
<td><p>{{ $personality->question}}</p></td>
<td><p>{{ $personality->question_type }}</p></td>
</tr>
@endforeach
</table>
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
</tr>
</thead>
@foreach ($learnersquestions as $learner)
@csrf
<tr>
<input type="hidden" class="btn_val_id" value="{{ $learner->id }}">
<td><p>{{ $learner->question_num }}</p></td>
<td><p>{{ $learner->question}}</p></td>
<td><p>{{ $learner->question_type }}</p></td>
</tr>
@endforeach
</table>
</div>
@endsection
