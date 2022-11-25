<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->check() && (auth()->user()->role_id != 1)){
            Auth::logout();
            return redirect()->route('login')->with('message', 'Your account is restricted');
        }
        
        $questions = Question::all(); 
        $stressquestions = Question::where('question_type','stress')->orderBy('question_num', 'asc')->get();
        $personalityquestions = Question::where('question_type','personality')->orderBy('question_num', 'asc')->get(); 
        $learnersquestions = Question::where('question_type','learners')->orderBy('question_num', 'asc')->get(); 
        
        return view('admin.questions', compact('questions','stressquestions','personalityquestions','learnersquestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'question_num' => 'required',
            'question' => 'required',
            'question_type' => 'required',
          ]);

        $question = new Question;
        $question->question_num = $request->input('question_num');
        $question->question = $request->input('question');
        $question->question_type = $request->input('question_type');
        $question->save();
        

        return redirect()->route('questions')->with('success','Question Added');
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
        if(Auth()->check() && (auth()->user()->role_id != 1)){
            Auth::logout();
            return redirect()->route('login')->with('message', 'Your account is restricted');
        }
        
        $getid = Question::findOrFail($id);
    
        return view('admin.users.updatequestion')->with('getid',$getid);
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
        $questions = Question::find($id);
    
            $questions->question_num = $request->input('question_num');
            $questions->question = $request->input('question');
            $questions->update();
            return redirect()->route('questions')->with('success','Question Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question_delete = Question::findorFail($id);
        $question_delete->delete();
        return response()->json(['status' => 'Delete Successful !']);
    }
}
