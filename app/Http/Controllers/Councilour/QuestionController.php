<?php

namespace App\Http\Controllers\Councilour;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.councilour.questions.viewquestions')->with ('questions',Question::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate($request,[
            'question' => 'required',
          ]);

        $question = new Question;
        $question->id = NULL;
        $question->question=$request->input('question_name');
        $question->save();

        if ($request->has('answer')){
            $question->assignAnswer($request->answer['answer_name']);
        }
    
        if ($request->has('permissions')){
            $question->givePermissionTo(collect($request->permissions)->pluck('id')->toArray());
        }
        return response(['message'=>'Answer Created', 'answer'=>$question]);
        

        // return redirect()->back()->with('success','Question Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
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
       $question = Question::find($id);
       if($question){
        //    $question->roles()->detach();
           $question->delete();
           return redirect()->route('admin.users.councilour.questions.viewquestions')->with('success', 'Question has been deleted');
       }
       return redirect()->route('admin.users.councilour.questions.viewquestions')->with('warning', 'This user cannot be deleted');
    }
}


