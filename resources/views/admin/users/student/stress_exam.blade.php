@extends('layouts.app')
@section('content')
<link href="{{ asset('css/questions.css') }}" rel="stylesheet">
<form method="POST" action="stress_exam" name="stressquestion" id="stressquestion">
@csrf
@foreach ($stress as $question)
<div class="wrapper">
  <div class="title">{{ $question->question_num }}. {{ $question->question}}</div>
  <div class="box">
      <input type="radio" name="select{{ $question->question_num }}" id="radio1{{ $question->question_num }}" value="0">
      <label for="radio1{{ $question->question_num }}">
        Not at all
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio2{{ $question->question_num }}" value="1" >
      <label for="radio2{{ $question->question_num }}">
        Several days
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio3{{ $question->question_num }}" value="2" >
      <label for="radio3{{ $question->question_num }}">
        More than half the days
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio4{{ $question->question_num }}" value="3">
      <label for="radio4{{ $question->question_num }}">
        Nearly everyday
      </label>
    </div>
    </div>
    <br><br><br>
@endforeach
<p>Total: £ <span id="total">0</span></p>
<input type="button" onClick="calculate()"
	Value="Calculate"/>

<p>The Result is : <br>
	<span id = "result"></span>
</p>
	<input type="hidden" id="result_name" name="result_name" value=""></input>
<button type="submit">Submit</button>
  </form>
  <input type="text" value="{{$questioncount}}" id="noquestions" name="noquestions">Question Count :{{$questioncount}}</input><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
  function calculate(){
$(":radio")

    var total = 0;
    let noquestions = document.getElementById('noquestions').value;
    var maxscore = 3*noquestions;
    
    
    $(":radio:checked").each(function(){
        total += Number(this.value);
    });
    $("#total").text(total);
    
    
    var notstress = maxscore*0.25;
    var stress = maxscore*0.50;
    var superstress = maxscore*0.75;
    $("#result").text(notstress);
    
    if(total <= notstress )
    {
      alert("You are not stress")
      $("#result_name").val("You are not stress");
      
      
    }
    else if (total <= superstress)
    {
      alert("You are stress")

      $("#result_name").val("You are stress");
    }
    else if (total > superstress)
    {
      alert("You are so stress")
   
      $("#result_name").val("You are so stress");
    }

};

  </script>
  
@endsection
