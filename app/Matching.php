<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
  public function matchingUsers()
  {
      return $this->hasMany('App\MatchingUser');
  }

  public function messages()
  {
      return $this->hasMany('App\Message');
  }

}
//