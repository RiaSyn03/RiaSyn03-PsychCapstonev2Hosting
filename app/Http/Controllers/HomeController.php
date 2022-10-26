<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Approvedappointment;
use App\Course;
use App\Http\Controllers\Controller;

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
        $users = User::all();
        $nousers = User::count();
        $appointments = Approvedappointment::count();
        $numcourses = Course::count();
        return view('home', compact('users', 'nousers', 'appointments', 'numcourses'));
    }
    public function adminregister()
    {
        return view('admin.users.adminregister');
    }

}
