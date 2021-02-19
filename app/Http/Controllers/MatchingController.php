<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Interest;
use App\Good;

class MatchingController extends Controller
{
    public  function index(){

      $receive_good_ids = Good::where([
        ['receive_id',Auth::id()],
        ['status',1]
      ])->pluck('send_id');

      $send_good_ids = Good::where([
        ['send_id',Auth::id()],
        ['status',1]
      ])->pluck('receive_id');

      $matching_user = $receive_good_ids->merge($send_good_ids);
      $matching_users = User::whereIn('id', $matching_user)->get();
      return view('matching.index', compact('matching_users'));
    }
}
