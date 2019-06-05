<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\ContestResult;

class ContestRound extends Model
{   
    protected $fillable = ['title', 'quantity_questions', 'quantity_easys', 'timer', 'quantity_correct',
                           'quantity_normals', 'quantity_hards', 'sequence', 'subject_id', 'level_id'];

    public function contest_results() {
      return $this->hasMany(ContestResult::class, 'contest_round_id');
    }

    public function level() {
      return $this->belongsTo(Level::class, 'level_id');
    }

    public function subject() {
      return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function getQuestionContestRound($level, $subject) {
      $questions = Question::where('level_id', $level)
                             ->where('subject_id', $subject)
                             ->where('status', 1)->get();

      if(count($questions->where('degree', 1)) < $this->quantity_easys) {
        return false;
      } else {
        $questions_easys = $questions->where('degree', 1)->random($this->quantity_easys);
      }

      if(count($questions->where('degree', 2)) < $this->quantity_normals) {
        return false;
      } else {
        $questions_normals = $questions->where('degree', 2)->random($this->quantity_normals);
      }

      if(count($questions->where('degree', 3)) < $this->quantity_hards) {
        return false;
      } else {
        $questions_hards = $questions->where('degree', 3)->random($this->quantity_hards);
      }
      
      $questions_degree = $questions_easys->merge($questions_normals)->merge($questions_hards);
      
      return $questions_degree;
    }

    public function nextRound() {
      $next_round = ContestRound::where('subject_id', $this->subject_id)
                                    ->where('level_id', $this->level_id)
                                    ->where('sequence', $this->sequence + 1)->first();
      return $next_round;
    }

    public function quantityTest($subject) {
      $result = ContestResult::where('user_id', auth()->user()->id)
                               ->where('level_id', auth()->user()->level_id)
                               ->where('contest_round_id', $this->id)
                               ->where('subject_id', $subject);

      return isset($result) ? count($result->get()) : '';
    }
}
