@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  `  <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">`
    <title>
        Calendar
    </title>
</head>
<body class="light">
<div class=”wrapper”>
        <div class="sidebar"  data-color="red" >
        <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        PSYCHCARE 2.0
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="{{ url('home') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('stdntquestionaire') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('stdnttime') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Test Result</p>
                        </a>
                    </li>
                    <li><li class="nav-link">
                        <a class="nav-item active" href="{{ url('stdntappointment') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Appointment</p>
                        </a>
                    </li>
                    <a class="nav-link" href="{{ url('appointment_history') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Appointment History</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
     
    <center>
<div class="calendarcontainer">
    <div class="calendar" id="blur">
        <div class="calendar-header">
            <span class="month-picker" id="month-picker">February</span>
            <div class="year-picker">
                <span class="year-change" id="prev-year">
                    <pre><</pre>
                </span>
                <span id="year">2021</span>
                <span class="year-change" id="next-year">
                    <pre>></pre>
                </span>
            </div>
        </div>
        <div class="calendar-body">
            <div class="calendar-week-day">
                <div style='color:red'>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="calendar-days"></div>
        </div>
        <div class="calendar-footer">
            <div class="toggle">
                <span>Dark Mode</span>
                <div class="dark-mode-switch">
                    <div class="dark-mode-switch-ident"></div>
                </div>
            </div>
        </div>
        <div class="month-list"></div>
        </div>
    </div>


    <div id="popup">
        <h2><div><center>Description</center></div></h2>
        <div id="appointmentDate"></div>
        <p>No Appointment in this current Date<p><br>
        <h3><div><center>Want to make an Appointment ?</center></div></h3>
        <form method="post" action="stdntappointment">
        @csrf
        <label>Date</label>
        <input type="text" name="date" id="appointdate">
        <p>Please select Time: <p>
        <select name="time">
        <!-- <optgroup>Morning</optgroup> -->
      <option value="9:00-10:00 AM">9:00-10:00 AM</option>
      <option value="10:00-11:00 AM">10:00-11:00 AM</option>
      <option value="11:00-12:00 PM">11:00-12:00 PM</option>
      <!-- <optgroup>Afternoon</optgroup> -->
      <option value="1:00-2:00 PM">1:00-2:00 PM</option>
      <option value="2:00-3:00 PM">2:00-3:00 PM</option>
      <option value="3:00-4:00 PM">3:00-4:00 PM</option>
    </select>
  </label>
  <button type="submit">Submit</button>
</form>

        <div onclick="toggle()"><center>Close</center></div>
        <p>List of Students</p>
    </div>
    
    
    <script src="js/calendar.js"></script>
@endsection