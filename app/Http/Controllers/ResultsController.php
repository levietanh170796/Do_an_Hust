<?php

namespace App\Http\Controllers;

use App\Result;
use App\Question;
use App\ContestRound;
use App\ContestResult;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contest_result = ContestResult::find($request->contest_result);
        $contest_round = ContestRound::find($request->contest_round);

        return view('results.index', compact('contest_result', 'contest_round'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }


    public function submit(Request $request) {
        $questions = $request->questions;
        $contest_round = ContestRound::find($request->contest_round_id);
        $user_id = auth()->user()->id;
        $contest_result = ContestResult::create([
            'user_id' => $user_id,
            'contest_round_id' => $contest_round->id,
            'number_question' => $contest_round->quantity_questions,
            'level_id' => $contest_round->level_id,
            'subject_id' => $contest_round->subject_id,
            'timer' =>  $contest_round->timer * 60 - $request->timer
        ]);

        $question_correct = 0;
        foreach($questions as $question_id) {
            $question = Question::find($question_id);
            $answer = $request->input($question_id);
            $correct = 0;
            if(isset($answer)) {
                $correct = $question->checkCorrectAnswer($answer);
                if($correct == 1) {
                    $question_correct++; 
                }
            }

            Result::create([
                'user_id' => $user_id,
                'question_id' => $question->id,
                'correct' => $correct,
                'questions_option_id' => $answer,
                'contest_result_id' => $contest_result->id
            ]);
        }
        
        $status = $question_correct >= $contest_round->quantity_correct ? 1 : 0;
        $contest_result->update([
            'number_question_correct' => $question_correct,
            'status' => $status
        ]);
        
        return redirect()->route('results.index', ['contest_result' => $contest_result,
                                                    'contest_round' => $contest_round]);
    }
}
