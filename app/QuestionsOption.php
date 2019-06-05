<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsOption extends Model
{
    protected $fillable = ['option', 'correct', 'question_id'];

    public function question() {
        return $this->belongTo(Question::class, 'question_id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'questions_option_id');
    }
}
