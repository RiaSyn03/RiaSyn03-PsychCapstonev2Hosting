@extends('layouts.app')
@section('content')
<link href="{{ asset('css/questions.css') }}" rel="stylesheet">
<form name="stressquestion" id="stressquestion">
@foreach ($stress as $question)
<div class="wrapper">
  <div class="title">{{ $question->question_num }}. {{ $question->question}}</div>
  <div class="box">
      <input type="radio" name="select{{ $question->question_num }}" id="radio1{{ $question->question_num }}" value="0">
      <label for="radio1{{ $question->question_num }}">
        Not at all
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio2{{ $question->question_num }}" value="1">
      <label for="radio2{{ $question->question_num }}">
        Several days
      </label>
      <input type="radio" name="select{{ $question->question_num }}" id="radio3{{ $question->question_num }}" value="2">
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
<input type="text" id="selvalue" name="score"/>
<!-- <button onlick="bogo();">Total</button> -->
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#stressquestion input').on('change' , function() {
        var selvalue = $("[type='radio']:checked").val();
        // for (i=0; i<=2; i++)
        // {
        //   $('#selvalue').val(+$("[type='radio']:checked").val());
        // }
        $('#selvalue').val($("[type='radio']:checked").val());
      });
    });


  </script>

  
 <!-- <script>
    
  //      function bogo() {
  //       var select = document.getElementByName("select{{ $question->question_num }}");
  //       if (select[0].checked)
  //       {
  //         var val=select[0].value;
  //         alert(val);
  //       }

  //      }
  // </script> -->
@endsection
