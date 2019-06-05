<?php

namespace App\Http\Controllers;

use App\ContestRound;
use App\Level;
use App\Subject;
use App\Http\Requests\ContestRoundRequest;
use Illuminate\Http\Request;

class ContestRoundsController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => ['index', 'rounds_by_subject']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');

        if(isset($request->level) && isset($request->subject)) {
            $level = $request->level;
            $subject = $request->subject;
        } else {
            $level = Level::first()->id;
            $subject = Subject::first()->id;
        }
        $contest_rounds = ContestRound::where('level_id', $level)
                                        ->where('subject_id', $subject)->paginate(20);

        return view('contest_rounds.index', compact('contest_rounds', 'levels', 'level', 'subjects', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');
        
        return view('contest_rounds.create', compact('levels', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestRoundRequest $request)
    {
        ContestRound::create($request->all());
        return redirect()->route('contest_rounds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function show(ContestRound $contest_round)
    {
        return view('contest_rounds.show', compact('contest_round', 'levels', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function edit(ContestRound $contest_round)
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');

        return view('contest_rounds.edit', compact('contest_round', 'levels', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function update(ContestRoundRequest $request, ContestRound $contestRound)
    {
        $contestRound->update($request->all());

        return redirect()->route('contest_rounds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContestRound  $contestRound
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContestRound $contestRound)
    {
        if (count($contestRound->contest_results()->get()) > 0) {

            return redirect()->route('contest_rounds.index')->with('error_delete', $contestRound->title);
        } else {
            $contestRound->delete();
            return redirect()->route('contest_rounds.index');
        }
    }

    public function rounds_by_subject(Request $request) {
        $rounds = ContestRound::pluck('title', 'id');

        if(isset($request->subject_id)) {
            $rounds = ContestRound::where('level_id', auth()->user()->level_id)
                                    ->where('subject_id', $request->subject_id)
                                    ->pluck('title', 'id');
        }

        return response()->json($rounds);
    }
}
