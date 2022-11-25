@extends('layouts.app')
@section('content')
<link href="{{ asset('css/category.css') }}" rel="stylesheet">
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
                <li><a href="{{ url('category') }}" class="active">Category</a></li>
                <li><a href="{{ url('appointment_history') }}" >Appointments</a></li>
                <li><a href="{{ url('exams_history') }}" >Exam History</a></li>
             <li><a href="{{ url('home') }}" >Home</a></li>
         </ul>
     </header>
     
<div class="category">
<div class="categorybody">
    <center><h1>LEARNERS</h1></center>
    <div class="category-align">
<div class=" categorycontainer">
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/visual.png') }}">
        </div>
        <div class="categorycontent">
            <h2>VISUAL</h2>
            <p>Learns by seeing or watching demonstrations. Likes description; sometimes stops  reading to stare into space and imagine scene; intense concentration. Remember faces, but forgets names; writes things down; takes notes. </p>
        </div>
        </div>
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/linguistic.png') }}">
        </div>
        <div class="categorycontent">
            <h2>LINGUISTIC</h2>
            <p>Learns through verbal instructions from self or others. Enjoys dialogue and plays; avoids lengthy descriptions; unaware of illustrations. Remembers names, but forgets faces; remembers by auditory repetition. Easily distracted by sounds.</p>
        </div>
        </div>
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/kinesthetic.png') }}">
        </div>
        <div class="categorycontent">
            <h2>KINESTHETIC</h2>
            <p>Learns by doing and direct involvement. Prefers stories where action occurs early; fidgets while reading; not an avid reader. Remembers best what was done, but not what was seen or talked about. Tries things out; touches, feels or manipulates.</p>
        </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<div class="category">
<h6>PERSONALITY</h6>
<div class="category-align2">
<div class="categorycontainer">
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/introvert.png') }}">
        </div>
        <div class="categorycontent">
            <h2>INTROVERT</h2>
            <p>An introvert prefers to spend time alone in order to recharge their inner being. An introvert may appear to be shy to others, but that is not necessarily an accurate label. Small talk and pointless conversations tend to draw down an introvert's energy rapidly.</p>
        </div>
        </div>
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/ambivert.png') }}">
        </div>
        <div class="categorycontent">
            <h2>AMBIVERT</h2>
            <p>An ambivert is moderately comfortable with groups and social interaction, but also relishes time alone, away from a crowd. In simpler words, an ambivert is a person whose behaviour changes according to the situation he/she is in.<br><br><br></p>
        </div>
        </div>
        <div class="categorycard">
        <div class="categoryimgBx">
            <img src="{{ asset('img/extrovert.png') }}">
        </div>
        <div class="categorycontent">
            <h2>EXTROVERT</h2>
            <p>Extroverts tend to enjoy human interactions and to be enthusiastic, talkative, assertive, and gregarious. An extroverted person is likely to enjoy time spent with people and find less reward in time spent alone.<br><br><br></p>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
    @endsection