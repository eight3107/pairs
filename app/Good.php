<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function senduser()
    {
        return $this->belongsTo('App\User', 'send_id', 'id');
    }
    
    public function receiveuser()
    {
        return $this->belongsTo('App\User', 'receive_id', 'id');
    }
}
