<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'level_id', 'subject_id', 'degree', 'status'];

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function question_options() {
        return $this->hasMany(QuestionsOption::class, 'question_id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'question_id');
    }

    public function checkCorrectAnswer($answer) {
        $answer = QuestionsOption::find($answer);
         return $answer->correct;
    }

    public function percentCorrectAnswer() {
        $total_questions = count($this->results()->get());
        $total_question_corrects = count($this->results()->where('correct', 1)->get());
        if($total_question_corrects == 0) {
            return 0;
        } 
        return round($total_question_corrects / $total_questions * 100, 2);
    }
}
