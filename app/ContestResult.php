<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContestRound;

class ContestResult extends Model
{
    protected $fillable = ['contest_round_id', 'number_question', 'number_question_correct',
                           'status', 'user_id', 'subject_id', 'level_id', 'timer'];

    public function contest_round() {
        return $this->belongsTo(ContestRound::class, 'contest_round_id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'contest_result_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function number_current_contest_round($subject, $user) {
        $results = ContestResult::where('contest_round_id', $this->contest_round_id)
                                  ->where('subject_id', $subject)
                                  ->where('level_id', $user->level_id)
                                  ->where('user_id', $user->id)
                                  ->pluck('id')->toArray();
        return  array_search($this->id, $results) + 1;
    }
}
