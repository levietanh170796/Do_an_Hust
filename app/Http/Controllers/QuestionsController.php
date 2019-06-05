<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsOption;
use App\Level;
use App\Subject;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
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
        $key = '';
        $statuses = [
            0 => 'Tất cả',
            1 => 'Không hiển thị',
            2 => 'Hiển thị',
        ];
        $degrees = [
            0 => 'Tất cả',
            1 => 'Dễ',
            2 => 'Trung bình',
            3 => 'Khó'
        ];
        $level = 0;
        $subject = 0;
        $degree = 0;
        $status = 0;
        $questions = Question::orderBy('id', 'desc');
        if(isset($request->key)) {
            $questions = $questions->where('title', 'like', '%'.$request->key.'%');
        } 
        if(isset($request->level)) {
            $level = $request->level;
            if($level != 0) {
                $questions = $questions->where('level_id', $level);
            }
        } 
        if(isset($request->subject)) {
            $subject = $request->subject;
            if($subject != 0) {
                $questions = $questions->where('subject_id', $subject);
            }
        } 
        if($request->degree) {
            $degree = $request->degree;
            if($degree != 0) {
                $questions = $questions->where('degree', $degree);
            }
        } 
        if($request->status == 0) {
            $questions = $questions->whereIn('status', [0,1]);
        }
        if($request->status == 1){
            $questions = $questions->where('status', 0);
        }
        if($request->status == 2){
            $questions = $questions->where('status', 1);
        }
        if($request->status == null){
            $questions = $questions->whereIn('status', [0,1]);
        }
        $status = $request->status;
        $key = $request->key;
        $questions = $questions->paginate(15);

        return view('questions.index', compact('questions', 'levels', 'subjects',
                                               'degrees', 'level', 'subject', 'degree','status', 'statuses', 'key' ));
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
        $corrects = [
            1 => "Đáp án 1",
            2 => "Đáp án 2",
            3 => "Đáp án 3",
            4 => "Đáp án 4",
        ];

        $degrees = [
            1 => 'Dễ',
            2 => 'Trung bình',
            3 => 'Khó'
        ];

        $statuses = [
            1 => 'Hiển thị',
            0 => 'Không hiển thị'
        ];

        return view('questions.create', compact('levels', 'subjects', 'corrects', 'degrees', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $request->validated();

        $question = Question::create($request->all());
        $options = [
            1 =>  $request->option1,
            2 =>  $request->option2,
            3 =>  $request->option3,
            4 =>  $request->option4
        ];
        $correct_id = $request->correct_id;
        foreach ($options as $key => $value) {
            $correct = ($correct_id == $key) ? 1 : 0;
            QuestionsOption::create(
                [
                    'option' => $value,
                    'correct' => $correct,
                    'question_id' => $question->id
                ]
            );
        }

        return redirect()->route('questions.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $levels = Level::pluck('title', 'id');
        $subjects = Subject::pluck('title', 'id');
        $corrects = [];
        $i = 1;
        $question_options = $question->question_options;
        foreach ($question_options as $value) {
            $corrects[$value->id] = "Đáp án ".$i;
            $i++;
        }

        $degrees = [
            1 => 'Dễ',
            2 => 'Trung bình',
            3 => 'Khó'
        ];

        $statuses = [
            1 => 'Hiển thị',
            0 => 'Không hiển thị'
        ];


        return view('questions.edit', compact('question', 'levels', 'subjects', 'corrects',
                                              'question_options', 'degrees', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $request->validated();

        $question->update($request->all());
        $correct_id = $request->correct_id;
        $options = [
            0 =>  $request->option1,
            1 =>  $request->option2,
            2 =>  $request->option3,
            3 =>  $request->option4
        ];
        foreach ($question->question_options as $key => $answer) {
            $correct = ($correct_id == $answer->id) ? 1 : 0;
            $answer->option = $options[$key];
            $answer->correct = $correct;
            $answer->save();
        }

        return redirect()->route('questions.show', [$question]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->question_options()->delete();
        $question->delete();
        return redirect()->route('questions.index');
    }
}
