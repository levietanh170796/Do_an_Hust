<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['user_id', 'question_id', 'correct', 'questions_option_id', 'contest_result_id'];

    public function contest_result() {
        return $this->belongsTo(ContestResult::class, 'contest_result_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function questions_option() {
        return $this->belongsTo(QuestionsOption::class, 'questions_option_id');
    }
}
