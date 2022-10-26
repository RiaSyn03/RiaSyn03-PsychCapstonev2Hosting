@extends('layouts.app')
@section('content')
@foreach ($stress as $s)
@if($s->result_name==1)
<body>
    <div class="modalcard">
        <div class="front-face"></div>
        <div class="back-face">
            <h2>Not Stress</h2>
            <p>Grabe</p>
            <div class="icons">
                <i class="fa fa-facebook-f"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
            </div>
        </div>
    </div>
@endif

@if($s->result_name="You are stress")
<body>
    <div class="modalcard">
        <div class="front-face"></div>
        <div class="back-face">
            <h2>Stress</h2>
            <p>Stresspcells</p>
            <div class="icons">
                <i class="fa fa-facebook-f"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
            </div>
        </div>
    </div>
@endif
@endforeach
@endsection