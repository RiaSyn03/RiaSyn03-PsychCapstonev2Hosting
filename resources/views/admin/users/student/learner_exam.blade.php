@extends('layouts.app')
@section('content')
<link href="{{ asset('css/questions.css') }}" rel="stylesheet">
<form name="stressquestion" id="stressquestion">
@foreach ($learner as $question)
<div class="wrapper">
  <div class="title">{{ $question->question_num }}. {{ $question->question}}</div>
  <div class="box">
      <input type="radio" name="select{{ $question->question_num }}" id="radio1{{ $question->question_num }}" value="1">
      <label for="radio1{{ $question->question_num }}">
      Never applies to me
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio2{{ $question->question_num }}" value="2" >
      <label for="radio2{{ $question->question_num }}">
      Sometimes applies to me
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio3{{ $question->question_num }}" value="3" >
      <label for="radio3{{ $question->question_num }}">
      Often applies to me
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

<p>You are : <br>
	<span id = "stresslvl"></span>
</p>


<!-- <input type="text" id="selvalue" name="score"/> -->
<!-- <button type="button" id="selvalue">Total</button> -->
  </form>
  <input type="text" value="{{$questioncount}}" id="noquestions" name="noquestions">Question Count :{{$questioncount}}</input><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>function calculate(){
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
    $("#result").text(maxscore);
    
    if(total <= notstress )
    {
      alert("You are Introvert");
    }
    else if (total <= superstress)
    {
      alert("You are Ambivert");
    }
    else if (total > superstress)
    {
      alert("You are Extravert");
    }


};

  </script>
  
@endsection
