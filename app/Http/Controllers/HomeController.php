<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Timeslot;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $users = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.role_id')
            ->join('courses', 'users.id', '=', 'courses.course_id')
            ->select('users.*', 'roles.role_name', 'courses.course_name')
            ->get();

        $nousers = User::count();
        $appointments = Timeslot::count();
        $numcourses = Course::count();
        $totalappointments = Timeslot::all()->count();
        $pending = Timeslot::where('status','pending')->count();
        $accepted = Timeslot::where('status','accepted')->count();
        
        return view('home', compact('users', 'nousers', 'appointments', 'numcourses','totalappointments','pending','accepted'));
    }
    public function adminregister()
    {
        return view('admin.users.adminregister');
    }

}
