<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchingUser extends Model
{
  protected $fillable = ['matching_id', 'user_id'];

  public function matching()
  {
      return $this->belongsTo('App\Matching');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
