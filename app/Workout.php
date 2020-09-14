<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
      'user_id',
      'name',
      'imgurl',
      'description',
      'reps'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
