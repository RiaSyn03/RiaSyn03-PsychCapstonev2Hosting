<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Timeslot;
use App\User;
use DB;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b

class Appointmentlist extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('admin.users.councilour.viewtime') ->with('timescheds', Timeslot::all());
=======

        $timescheds = DB::table('users')
        ->join('timeslots', 'timeslots.user_id', '=', 'users.id')
        ->select('timeslots.id','users.idnum', 'timeslots.time', 'timeslots.date')
        ->get()->toArray();

        return view('admin.users.councilour.viewtime')->with(['timescheds' => $timescheds]);
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'time' => 'required',
            'date' => 'required',
          ]);
        $timeslot = new Timeslot;
<<<<<<< HEAD
        $timeslot->user_fname = $request->user()->fname;
        $timeslot->user_idnum = $request->user()->idnum;
        $timeslot->time = $request->input('time');
        $timeslot->date = $request->input('date');
=======
        $timeslot->user_id = $request->user()->id;
        $timeslot->time=$request->input('time');
        $timeslot->date=$request->input('date');
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
        $timeslot->save();

        return redirect()->route('stdntappointment')->with('success','Time Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show()
    {
        return view('admin.users.student.appointment_history') ->with('timescheds', Timeslot::all());
        // if(Auth::user()->idnum == $idnum){
        //     return view('admin.users.councilour.appointment_history') ->with('timescheds', Timeslot::all());
        // }
        // else{
        //     return view('No appointment to show');
        // }
=======
    public function show($id)
    {
        //
>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serv_cate = Timeslot::findorFail($id);
        $serv_cate->delete();
        return response()->json(['status' => 'Delete Successful !']);
    }

    public function bookappoint()
    {
        

        return view('admin.users.councilour.stdntappointment');
    }

<<<<<<< HEAD
}
=======
}

>>>>>>> 106ca1a483bdf725dccae9f53e85da85d3cea71b
