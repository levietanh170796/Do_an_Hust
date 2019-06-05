<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['title', 'description'];

    public function questions() {
        return $this->hasMany(Question::class, 'subject_id');
    }

    public function contest_rounds() {
        return $this->hasMany(ContestRound::class, 'subject_id');
    }

    public function contest_results() {
        return $this->hasMany(ContestResult::class, 'subject_id');
    }

    public function currentRound() {
        $last_contest_result = ContestResult::where('user_id', auth()->user()->id)
                                              ->where('subject_id', $this->id)
                                              ->where('level_id', auth()->user()->level_id)
                                              ->orderBy('id', 'desc')->first();
        if($last_contest_result == null) {
           $current_round = ContestRound::where('subject_id', $this->id)
                                          ->where('level_id', auth()->user()->level_id)
                                          ->orderBy('sequence', 'asc')->first();
            return $current_round;
        } else {
            if($last_contest_result->status == 1) {
                $next_round = $last_contest_result->contest_round->nextRound();
            } else {
                $next_round = $last_contest_result->contest_round;
            }

            if($next_round == null) {
                return $last_contest_result->contest_round;
            }

            return $next_round;
        }
    }

    public function maxScore($contest_round_id) {
        $last_contest_result = ContestResult::where('user_id', auth()->user()->id)
                                              ->where('subject_id', $this->id)
                                              ->where('level_id', auth()->user()->level_id)
                                              ->where('contest_round_id', $contest_round_id)
                                              ->orderBy('id', 'desc')->first();
        if($last_contest_result == null) {
            $current_round = ContestRound::find($contest_round_id);
            if($current_round == null) {
                return '';
            } else {
                return '0/'.$current_round->quantity_questions;
            }
        } else {
            $score = ContestResult::where('user_id', auth()->user()->id)
                                    ->where('subject_id', $this->id)
                                    ->where('level_id', auth()->user()->level_id)
                                    ->where('contest_round_id', $contest_round_id)
                                    ->orderBy('number_question_correct', 'desc')->first();

            return $score->number_question_correct.'/'.$score->contest_round->quantity_questions;
        }
    }

    public function leader_boards($round) {
        $results = ContestResult::where('contest_round_id', $round)
                                  ->where('subject_id', $this->id)
                                  ->orderBy('number_question_correct', 'desc')
                                  ->orderBy('timer', 'asc')
                                  ->limit(15)->get();

        return $results;
    }

    public function checkPassRound($round) {
        $result = ContestResult::where('contest_round_id', $round)
                                  ->where('user_id', auth()->user()->id)
                                  ->where('subject_id', $this->id)
                                  ->orderBy('id', 'desc')->first();

        if($result != null) {
            return $result->status == 1;
        }

        return false;
    }
}
