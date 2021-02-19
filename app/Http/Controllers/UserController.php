<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Prefecture;
use App\Interest;
use App\Good;

class UserController extends Controller
{
    public function show($id)
    {

        //$user = User::findorFail($id);
        $user = User::with('prefecture')->find($id);

        return view('users.show', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        $prefectures = Prefecture::pluck('name', 'id');

        return view('users.edit', ['user' => $user,'prefectures' => $prefectures]);
    }
    public function update(Request $request)
    {

        $user = User::find($request->id);
        $user->name = $request->user_name;
        $user->sentence = $request->user_sentence;
        $user->prefecture_id = $request->prefecture_id;
        if ($request->user_pic !=null) {
            $request->user_pic->storeAs('public/user_images', $user->id . '.jpg');
            $user->pic = $user->id . '.jpg';
        }
        $user->save();

        return redirect('/users/show/'.$request->id);
    }
    public function index(Request $request)
    {

      $user = Auth::user();

//異性のみを表示するようにする
      if(
        $user->gender == 0 ) {
        $target_gender = 1;
      }

      if(
        $user->gender ===1) {
        $target_gender = 0;
      }


            $receive_good_ids = Good::where([
              ['receive_id',Auth::id()],
              ['status',1]
            ])->pluck('send_id');

            $send_good_ids = Good::where([
              ['send_id',Auth::id()],
              ['status',1]
            ])->pluck('receive_id');

            $matching_user = $receive_good_ids->merge($send_good_ids);
            $receiveusers = Good::where('receive_id',Auth::id())->where('status', 0)->pluck('send_id');

//dd($receiveusers);
//年齢で抽出
      $underage = $request->input('underage');
      $overage = $request->input('overage');
//dd($underage,$overage);
//マッチングしたユーザー、いいねされたユーザーはwhereNotInで非表示
if (!empty($underage) && !empty($overage)){
  $users = User::with('prefecture')
  ->whereNotIn('id', $matching_user)
  ->whereNotIn('id', $receiveusers)
  ->where('age', '>=', $underage)->where('age', '<=', $overage)
  ->where('gender', $target_gender)
  ->paginate(20);
}

if (empty($underage) && !empty($overage)){
  $users = User::with('prefecture')
  ->whereNotIn('id', $matching_user)
  ->whereNotIn('id', $receiveusers)
  ->where('age', '<=', $overage)
  ->where('gender', $target_gender)
  ->paginate(20);
}

if (!empty($underage) && empty($overage)){
  $users = User::with('prefecture')
  ->whereNotIn('id', $matching_user)
  ->whereNotIn('id', $receiveusers)
  ->where('age', '>=', $underage)
  ->where('gender', $target_gender)
  ->paginate(20);
}

if (empty($underage)  && empty($overage) ){
  //$users = DB::table('users')
  $users = User::with('prefecture')
  ->whereNotIn('id', $matching_user)
  ->whereNotIn('id', $receiveusers)
  ->where('gender', $target_gender)
  ->paginate(20);
}


      return view('users.index', compact('users','underage','overage'));
    }

    public function receive()
    {

      $users = Good::where('receive_id',Auth::id())->where('status', 0)->get();

      return view('users.receive', compact('users'));
    }

    public function send($receive_id)
    {
      $users = Good::where('send_id', $receive_id )->where('status', 0)->get();
      return view('users.send', compact('users'));
    }
    public function apiindex($id)
    {
      //$users = User::all();
      $users = User::findorFail($id);
      return $users;
    }
}
