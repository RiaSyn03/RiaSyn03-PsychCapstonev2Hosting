<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Appointmenthistory extends Controller
{
    public function myhistory($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.student.appointment_history')->with('warning', 'You are not allowed to edit yourself.');
    }

}
}   
