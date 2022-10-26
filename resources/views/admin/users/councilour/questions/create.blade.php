@extends('layouts.app')
@section('content')
<!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Laravel</title>

                <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

                <!-- Styles -->
                <style>
                    html, body {
                        background-color: #fff;
                        color: #636b6f;
                        font-family: 'Nunito', sans-serif;
                        font-weight: 200;
                        height: 100vh;
                        margin: 0;
                    }

                    .full-height {
                        height: 100vh;
                    }

                    .flex-center {
                        align-items: center;
                        display: flex;
                        justify-content: center;
                    }

                    .position-ref {
                        position: relative;
                    }

                    .top-right {
                        position: absolute;
                        right: 10px;
                        top: 18px;
                    }

                    .content {
                        text-align: center;
                    }

                    .title {
                        font-size: 84px;
                    }

                    .links > a {
                        color: #636b6f;
                        padding: 0 25px;
                        font-size: 13px;
                        font-weight: 600;
                        letter-spacing: .1rem;
                        text-decoration: none;
                        text-transform: uppercase;
                    }

                    .m-b-md {
                        margin-bottom: 30px;
                    }
                </style>
            </head> 
            <body>
            <div class="container">
            @include('admin.users.councilour.questions.message')
                    <div class="content">
                    <div class="row justify-content-center">
                <div class="card">
                <div class="admincontainer">
                <div class="adminbox">
                <div class="card-body">
                <div class="adminicon">01</div>
                <div class="admincontent">
                <h3>Psychological Exam</h3>
                 <div class="managebtn"><a href="{{ route('psychological') }}">Manage Questionaire</div></a>
             </div>
         </div>
         </div>
         <div class="adminbox">
                <div class="card-body">
                <div class="adminicon">02</div>
                <div class="admincontent">
                <h3>Add Users</h3>
                 <div class="managebtn"><a href="{{ route('register') }}">Add User</div></a>
                </div>
                </div>
                </div>
                <div class="admincontainer">
                <div class="adminbox">
                <div class="card-body">
                <div class="adminicon">03</div>
                <div class="admincontent">
                <h3>List of Users</h3>
                 <div class="managebtn"><a href="{{ route('admin.users.index') }}">Manage Users</div></a>
             </div>
         </div>
         </div>
          
         <div class="adminbox">
                <div class="card-body">
                <div class="adminicon">04</div>
                <div class="admincontent">
                <h3>Add Users</h3>
                 <div class="managebtn"><a href="{{ route('register') }}">Add User</div></a>
                </div>
                </div>
                </div>

                <div class="content">


                        <div class="links">
                            <a href="{{route('questions.create')}}">Add Question?</a>
                            <a href="{{ route('questions.index')}}">List of Questions</a>
                            <a> Exam Tab</a>
                            <a>Appointment</a>

                    
                    </div>
                </div>

@endsection