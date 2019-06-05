<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->hasOne(User::class, 'level_id');
    }

    public function questions() {
       return $this->hasMany(Question::class, 'level_id');
    }

    public function contest_rounds() {
        return $this->hasMany(ContestRound::class, 'level_id');
    }

    public function contest_results() {
        return $this->hasMany(ContestResult::class, 'level_id');
    }
}
