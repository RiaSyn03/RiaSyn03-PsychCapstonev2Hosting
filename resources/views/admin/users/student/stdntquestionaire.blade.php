@extends('layouts.app')
@section('content')
<link href="{{ asset('css/stdntquestionaire.css') }}" rel="stylesheet">
<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
  <div id="text" class="text0">Around The World</div>
    <div id="text" class="text1">Around The World</div>
    <div id="text" class="text2">Around The World</div>
    <div id="text" class="text3">Around The World</div>
	
  <div id="dummy">
    <div id="back">BACK TO TOP</div>
  </div>
  <script src="js/stdntquestionaire.js"></script>
@endsection