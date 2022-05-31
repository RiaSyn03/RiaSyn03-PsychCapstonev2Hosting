<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Timeslot;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class Appointmentlist extends Controller
{
    public function index()
    {
        return view('admin.users.councilour.viewtime') ->with('timescheds', Timeslot::all());
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
        $timeslot->user_fname = $request->user()->fname;
        $timeslot->user_idnum = $request->user()->idnum;
        $timeslot->time = $request->input('time');
        $timeslot->date = $request->input('date');
        $timeslot->save();

        return redirect()->route('stdntappointment')->with('success','Time Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $timescheds = DB::table('timeslots')->where('user_idnum','33333333' )->first();
        // return view('admin.users.student.appointment_history' , ['timescheds' => $timescheds]);
     
        return view('admin.users.student.appointment_history') ->with('timescheds', Timeslot::all());
        
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
        $appointment_delete = Timeslot::findorFail($id);
        $appointment_delete->delete();
        return response()->json(['status' => 'Delete Successful !']);
    }

    public function bookappoint()
    {
        

        return view('admin.users.councilour.stdntappointment');
    }

}
