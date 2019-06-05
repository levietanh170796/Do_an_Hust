<?php

namespace App\Http\Controllers;

use App\ContestResult;
use App\Level;
use App\Subject;
use App\ContestRound;
use App\User;
use Illuminate\Http\Request;

class ContestResultsController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $levels = Level::pluck('title', 'id')->toArray();
        $levels = [0 => 'Tất cả'] + $levels;
        $subjects = Subject::pluck('title', 'id')->toArray();
        $subjects = [0 => 'Tất cả'] + $subjects;
        $level = 0;
        $subject = 0;
        $user_name = '';


        $contest_results = ContestResult::orderBy('id', 'desc');

        if(isset($request->level) && $request->level != 0) {
            $level = $request->level;
            $contest_results = $contest_results->where('level_id', $level);
        } 
        if(isset($request->subject) && $request->subject != 0) {
            $subject = $request->subject;
            $contest_results = $contest_results->where('subject_id', $subject);
        } 
        if(isset($request->user_name) && trim($request->user_name) != '') {
            $user_name = trim($request->user_name);
            $user_ids = User::where('name', 'like', '%'.$user_name.'%')->pluck('id');

            $contest_results = $contest_results->whereIn('user_id', $user_ids);
        } 

        $contest_results = $contest_results->paginate(15);
        
        return view('contest_results.index', compact('contest_results', 'levels', 'subjects',
                                                     'level', 'subject', 'user_name'));
    }

    public function my_results(Request $request) {
        if(auth()->user()->level_id == 0) {
            return redirect('user_profiles')->with('status', 'false');
        } 

        $subjects = Subject::pluck('title', 'id')->toArray();
        $subjects = [0 => 'Tất cả'] + $subjects;
        $subject = 0;

        if($request->subject) {
            $subject = $request->subject;
            $contest_results = ContestResult::where('user_id', auth()->user()->id)
                                              ->where('level_id', auth()->user()->level_id)
                                              ->where('subject_id', $subject)
                                              ->orderBy('id', 'desc')->paginate(15);
        } else {
            $contest_results = ContestResult::where('user_id', auth()->user()->id)
                                              ->where('level_id', auth()->user()->level_id)
                                              ->orderBy('id', 'desc')->paginate(15);
        }
        
        return view('contest_results.my_results', compact('contest_results', 'subjects', 'subject'));
    }

    public function show($id){
        $contest_result = ContestResult::find($id);
        $option_names = [
            0 => "A. ",
            1 => "B. ",
            2 => "C. ",
            3 => "D. ",
        ];

        if(auth()->user()->isAdmin()) {
            return view('contest_results.show', compact('contest_result', 'option_names'));
        }

        return view('contest_results.show_user', compact('contest_result', 'option_names'));
    }

    public function leader_boards(Request $request) {
        if(auth()->user()->level_id == 0) {
            return redirect('user_profiles')->with('status', 'false');
        } 

        $subjects = Subject::pluck('title', 'id');
        $subject = Subject::first()->id;
        

        if(isset($request->subject)) {
            $subject  = $request->subject;
        } 

        $contest_rounds = ContestRound::where('level_id', auth()->user()->level_id)
                                        ->where('subject_id', $subject)
                                        ->orderBy('sequence', 'asc')
                                        ->pluck('title', 'id');
        
        $contest_round = ContestRound::where('level_id', auth()->user()->level_id)
                                       ->where('subject_id', $subject)
                                       ->orderBy('sequence', 'asc')->first()->id;

        if(isset($request->contest_round)) {
            $contest_round = $request->contest_round;
        } 

        $total_subjects = [Subject::find($subject)];
        $total_contest_rounds = [ContestRound::find($contest_round)];

        return view('contest_results.leader_boards', compact('subjects', 'subject', 'contest_round',
                                                             'total_subjects', 'total_contest_rounds', 'contest_rounds'));
    }

    public function do_tests(Request $request) {
        $level = $request->level;
        $subject = $request->subject;
        $contest_round = $request->contest_round;
        $option_names = [
            0 => "A. ",
            1 => "B. ",
            2 => "C. ",
            3 => "D. ",
        ];

        if(isset($level) && isset($subject) && isset($contest_round)) {
            $ob_contest_round = ContestRound::find($contest_round);
            if($ob_contest_round->getQuestionContestRound($level, $subject) == false) {
                return view('contest_results.do_tests')->with('failMsg', "Vòng thi chưa sẵn sàng. Bạn vui lòng quay lại sau!");
            }
            $questions = $ob_contest_round->getQuestionContestRound($level, $subject);
        }

        return view('contest_results.do_tests', compact('questions', 'level', 'subject', 'contest_round', 'option_names'));
    }
}
