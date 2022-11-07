<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Course;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $admins = User::where('role_id','1')->orderBy('lname', 'asc')->get();
        $counselours = User::where('role_id','2')->orderBy('lname', 'asc')->get();
        $students = User::where('role_id','3')->orderBy('lname', 'asc')->get();
        $users = User::all();
        $courses = Course::all();
        $numusers = User::count();
        return view('admin.users.index', compact('users', 'numusers', 'courses', 'admins', 'counselours', 'students', 'roles'));

}

    public function create(Request $request)
    {
    $request->validate([
        'idnum'=>'required',
        'fname'=>'required',
        'mname'=>'required',
        'lname'=>'required',
        'course_id'=>'nullable',
        'year'=>'required',
        'role_id'=>'required',
        'email'=>'required|email',
        'password'=>'required',

    ]);
    $user = User::create([
        'idnum'=> $request->idnum,
        'fname'=> $request->fname,
        'mname'=> $request->mname,
        'lname'=> $request->lname,
        'course_id'=> $request->course_id,
        'year'=> $request->year,
        'role_id'=>$request->role_id,
        'email'=> $request->email,
        'password'=>bcrypt($request->password)

    ]);

    // if ($request->has('role')){
    //     $user->assignRole($request->role['name']);
    // }
    // $role = Role::select('id')->where('role_name', 'student')->first();
    //     $user->roles()->attach($role);
        return redirect()->route('admin.users.index')->with('success','Student Added');
    }

    public function makecounselour(Request $request)
        {
        $request->validate([
            'idnum'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'course_id'=>'nullable',
            'year'=>'required',
            'role_id'=>'required',
            'email'=>'required|email',
            'password'=>'required',

        ]);
        $user = User::create([
            'idnum'=> $request->idnum,
            'fname'=> $request->fname,
            'mname'=> $request->mname,
            'lname'=> $request->lname,
            'course_id'=> $request->course_id,
            'role_id'=>$request->role_id,
            'year'=> $request->year,
            'email'=> $request->email,
            'password'=>bcrypt($request->password)
            


        ]);

        // if ($request->has('role')){
        //     $user->assignRole($request->role['name']);
        // }

        // if ($request->has('permissions')){
        //     $user->givePermissionTo(collect($request->permissions)->pluck('id')->toArray());
        // }
        $role = Role::select('id')->where('role_name', 'councilour')->first();
        $user->roles()->attach($role);
        return redirect()->route('admin.users.index')->with('success','Counselour Added');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }

        return view('admin.users.edit')->with(['user'=>User::find($id)]);
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
        $request->validate([
            'idnum'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'course_id'=>'nullable',
            'year'=>'required',
            'email'=>'required|email',
        ]);
        $users = User::find($id);

        $users->idnum = $request->input('idnum');
        $users->fname = $request->input('fname');
        $users->mname = $request->input('mname');
        $users->lname = $request->input('lname');
        $users->course_id = $request->input('course_id');
        $users->year = $request->input('year');
        $users->email = $request->input('email');

        $users->save();

        return redirect('/user')->with('Profile Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself.');
       }


       $user = User::find($id);
       if($user){
           $user->roles()->detach();
           $user->delete();
           return redirect()->route('admin.users.index')->with('success', 'Users has been deleted');
       }
       return redirect()->route('admin.users.index')->with('warning', 'This user cannot be deleted');
    }
}

