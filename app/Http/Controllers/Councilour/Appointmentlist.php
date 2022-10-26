<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Timeslot;
use App\User;
use App\Done;
use App\Accept;
use DB;
use Illuminate\Support\Facades\Auth;

class Appointmentlist extends Controller
{
    public function index()
    {
       $timescheds = Timeslot::all();
       $done = Done::all();
       $id = Auth()->user()->fname;
       $acceptedlist = Accept::where('councilour_name',$id)->get();
       $donelist = Done::where('councilour_name',$id)->get();
        return view('admin.users.councilour.viewtime',compact('timescheds','done','donelist','acceptedlist'));
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
        $id = Auth()->user()->idnum;
        $mylist = Timeslot::where('user_idnum',$id)->get();
        $donelist = Done::where('user_idnum',$id)->get();
        // $mylist = Timeslot::all();
        return view('admin.users.student.appointment_history', compact('mylist','donelist'));

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

    public function accepted(Request $request)
    {
        $this->validate($request,[
            'user_fname' => 'required',
            'user_idnum' => 'required',
            'time' => 'required',
            'date' => 'required',
            
          ]);
        // Timeslot::where('id',$id)->delete();
        $accept = new Accept;
        $accept ->user_fname = $request->input('user_fname');
        $accept ->user_idnum = $request->input('user_idnum');
        $accept ->time = $request->input('time');
        $accept ->date = $request->input('date');
        $accept ->councilour_name = $request->user()->fname;
        $accept ->save();
       
        return redirect()->route('viewtime')->with('success','Added to Accepted');
    }

    public function done(Request $request)
    {
        $this->validate($request,[
            'user_fname' => 'required',
            'user_idnum' => 'required',
            'time' => 'required',
            'date' => 'required',
            
          ]);
        // Timeslot::where('id',$id)->delete();
        $done = new Done;
        $done ->user_fname = $request->input('user_fname');
        $done ->user_idnum = $request->input('user_idnum');
        $done ->time = $request->input('time');
        $done ->date = $request->input('date');
        $done ->councilour_name = $request->user()->fname;
        $done ->save();
       
        return redirect()->route('viewtime')->with('success','Added to Completed ');
    }
}
