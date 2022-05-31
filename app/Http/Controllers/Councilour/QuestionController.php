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
        

        return redirect()->route('viewquestions')->with('success','Question Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stress = Question::where('question_type','stress')->get();
        return view('admin.users.student.stress_exam', compact('stress'));
     
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
        $question_delete = Question::findorFail($id);
        $question_delete->delete();
        return response()->json(['status' => 'Delete Successful !']);
    }

    // public function calculate(Request $request)
    // {
    //     for(a=1; a<=maxquestion; a++) {
    //     $answer = $request->input('choice');
    //     }
    // }
    }


