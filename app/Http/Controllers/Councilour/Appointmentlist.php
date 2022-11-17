<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Timeslot;
use App\User;
use App\Done;
use App\Accept;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use App\Mail\DeclineMail;
use Illuminate\Support\Facades\Auth;

class Appointmentlist extends Controller
{
    public function index()
    {
        $id = Auth()->user()->fname;
       $timescheds = Timeslot::where('status','pending')->get();
       $id = Auth()->user()->fname;
       $acceptedlist = Timeslot::where('counselor_name',$id)->where('status','accepted')->get();
       $reschedule = Timeslot::where('counselor_name',$id)->where('status','Re-Schedule')->get();
       $donelist = Timeslot::where('status','done')->where('counselor_name',$id)->get();
        return view('admin.users.councilour.viewtime',compact('timescheds','donelist','acceptedlist','reschedule'));
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
            'status' => 'required',
            'counselor_name' => 'nullable',
          ]);
        $timeslot = new Timeslot;
        $timeslot->user_fname = $request->user()->fname;
        $timeslot->user_idnum = $request->user()->idnum;
        $timeslot->time = $request->input('time');
        $timeslot->date = $request->input('date');
        $timeslot->status = $request->input('status');
        $timeslot->counselor_name = $request->input('counselor_name');
        $timeslot->user_email = $request->user()->email;
        $timeslot->save();
        return redirect()->route('appointment_history')->with('success','Time Added');
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
        $pending = Timeslot::where('user_idnum',$id)->where('status','pending')->get();
        $donelist = Timeslot::where('user_idnum',$id)->where('status','done')->get();
        return view('admin.users.student.appointment_history', compact('mylist','donelist','pending'));
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

    public function updatetime($id)
    {
        $counsel_name = Timeslot::select('counselor_name')->where('id',$id)->first();
        $status = Timeslot::select('status')->where('id',$id)->first();
        if ($status->status='pending'){
            $status='accepted';
            $counsel_name= Auth()->user()->fname;
           }else{
            $status='pending';
           }
           Timeslot::where('id',$id)->update(['status'=>$status]);
           Timeslot::where('id',$id)->update(['counselor_name'=>$counsel_name]);
           return redirect()->back();
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
    public function destroycompleted($id)
    {
        $completed_delete = Done::findorFail($id);
        $completed_delete->delete();
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
        $accept = new Accept;
        $accept ->user_fname = $request->input('user_fname');
        $accept ->user_idnum = $request->input('user_idnum');
        $accept ->time = $request->input('time');
        $accept ->date = $request->input('date');
        $accept ->councilour_name = $request->user()->fname;
        $accept ->save();
       
        return redirect()->route('viewtime')->with('success','Added to Accepted');
    }

    public function done($id)
    {
        $status = Timeslot::select('status')->where('id',$id)->first();
        if ($status->status='accepted'){
            $status='done';
           }else{
            $status='accepted';
           }
           Timeslot::where('id',$id)->update(['status'=>$status]);
           return redirect()->back();
    }

    public function resched($id)
    {
        $status = Timeslot::select('status')->where('id',$id)->first();
        if ($status->status='pending'){
            $status= 'Re-Schedule';
            $counsel_name= Auth()->user()->fname;
           }else{
            $status='pending';
           }
           Timeslot::where('id',$id)->update(['status'=>$status]);
           Timeslot::where('id',$id)->update(['counselor_name'=>$counsel_name]);
           return redirect()->route('viewtime')->with('success', 'Successfully moved to Reschedule List !');
    }

    function sendmail(){
        $name = "PsychCare2.0 Team";  // Name of your website or yours
        $to = $_POST["email"];  // mail of reciever
        $subject = $_POST["subject"];
        $body = $_POST["body"];
        $from = "psychchare2.0@gmail.com";  // you mail
        $password = "arjyehddheoatpwj";  // your mail password

        // Ignore from here

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            return redirect()->route('viewtime')->with('success', 'Email Sent !');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check your Internet Connection');
        }
    }
        // // sendmail();  // call this function when you want to

        // if (isset($_POST['sendmail'])) {
        //     sendmail();
        // }

        public function getreschedid(Request $request, $id)
        {
            $getid = Timeslot::findOrFail($id);
    
            return view('admin.users.councilour.updateschedule')->with('getid',$getid);
        }

        public function updateresched(Request $request, $id)
        {
           
            $timeslots = Timeslot::find($id);
    
            $timeslots->time = $request->input('time');
            $timeslots->status = $request->input('status');
            $timeslots->date = $request->input('date');
            $timeslots->update();
            return redirect()->route('viewtime')->with('success','Date and Time Updated !');
        }

        public function adminappointments()
    {
       $timescheds = Timeslot::all();
        return view('admin.users.manageappointments',compact('timescheds'));
    }

    public function adminupdate(Request $request, $id)
    {
        $request->validate([
            'counselor_name'=>'required',
            'status'=>'required',
            
        ]);
        $timeslots = Timeslot::find($id);

        $timeslots->counselor_name = $request->input('counselor_name');
        $timeslots->status = $request->input('status');

        $timeslots->update();

        return redirect()->back()->with('success', 'Update Success !');
    }
}


    
