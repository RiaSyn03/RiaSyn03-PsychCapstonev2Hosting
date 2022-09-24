@extends('layouts.app')
@section('content')
<section>
     <header>
         <a href="#" class="logo">Logo</a>
         <ul>
             <li><a href="{{ url('home') }}">Home</a></li>
             <li><a href="{{ url('exams_history') }}">Exam History</a></li>
             <li><a href="{{ url('stdntappointment') }}">Appointment</a></li>
             <li><a href="{{ url('appointment_history') }}">My Appointments</a></li>
         </ul>
     </header>
     <div class="content">
                    <div class="container-fluid">
                     <div class="wellnesscard"> 
        <center><img src="{{ asset('img/wellness.png') }}"></center>
        <div class="wellnessrow">
            <div class="wellnesscol-3">
                <div class="wellnessbox">
                    <div class="wellnessinfo">
                        <div class="wellnessinfo-inner">
                            
                            <i> Talking about your feelings isn’t a sign of weakness. It’s part of taking charge of your well-being and doing what you can to stay healthy. </i>  
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class ="wellnessbutton" button>Talk about your feelings</div>
                </div>
                </div>
                <div class="wellnesscol-3">
                <div class="wellnessbox">
                    <div class="wellnessinfo">
                        <div class="wellnessinfo-inner">
                            <i> Exercise also keeps the brain and your other vital organs healthy.</i>
                        </div>
                    </div>
                    <div class ="wellnessbutton" button>Keep active</div>
                </div>
                </div>
                <div class="wellnesscol-3">
                <div class="wellnessbox">
                    <div class="wellnessinfo">
                        <div class="wellnessinfo-inner">
                            <i> Your brain needs a mix of nutrients to stay healthy and function well, just like the other organs in your body.</i>
                        </div>
                    </div>
                    <div class ="wellnessbutton" button>Eat well</div>
                    </div>
                </div>
                </div>
                   
                <div class="wellnessrow">
                <div class="wellnesscol-3">
                    <div class="wellnessbox">
                        <div class="wellnessinfo">
                            <div class="wellnessinfo-inner">
                                <i> Strong family ties and supportive friends can help you deal with the stresses of life. </i>
                            </div>
                        </div>
                        <div class ="wellnessbutton" button>Keep in touch</div>
                    </div>
                    </div>
                    <div class="wellnesscol-3">
                        <div class="wellnessbox">
                            <div class="wellnessinfo">
                                <div class="wellnessinfo-inner">
                                    <i> If things are getting too much for you and you feel you can’t cope, ask for help.</i>
                                </div>
                            </div>
                            <div class ="wellnessbutton" button>Ask for help</div>
                        </div>
                        </div>
                        <div class="wellnesscol-3">
                            <div class="wellnessbox">
                                <div class="wellnessinfo">
                                    <div class="wellnessinfo-inner">
                                        <i> A change of scene or a change of pace is good for your mental health.</i>
                                    </div>
                                </div>
                                <div class ="wellnessbutton" button>Take a break</div>
                            </div>
                            </div>
                            </div>
                            <div class="wellnessrow">
                            <div class="wellnesscol-3">
                        <div class="wellnessbox">
                            <div class="wellnessinfo">
                                <div class="wellnessinfo-inner">
                                    <i> Doing an activity you enjoy probably means you’re good at it and achieving something boosts your self-esteem.</i>
                                </div>
                            </div>
                            <div class ="wellnessbutton" button>Do something you're good at</div>
                        </div>
                        </div>
                        <div class="wellnesscol-3">
                        <div class="wellnessbox">
                            <div class="wellnessinfo">
                                <div class="wellnessinfo-inner">
                                    <i>Relaxing is one of those things that's easy to say and harder to do. Unwinding and staying calm can take practice.</i>
                                </div>
                            </div>
                            <div class ="wellnessbutton" button>Write Down Ways to Relax</div>
                        </div>
                        </div>
                         </div>
                         </div>
                         


@endsection

             
                                    
            