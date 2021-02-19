<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use Illuminate\Http\Request;
use App\Matching;
use App\MatchingUser;
use App\Message;
use App\User;
use App\Good;



use Auth;

class MessageController extends Controller
{
  public static function show(Request $request){

  $matching_user_id = $request->user_id;

  // 自分の持っているチャットルームを取得
  $current_user_chat_rooms = MatchingUser::where('user_id', Auth::id())
  ->pluck('matching_id');

  // 自分の持っているチャットルームからチャット相手のいるルームを探す
  $matching_id = MatchingUser::whereIn('matching_id', $current_user_chat_rooms)
      ->where('user_id', $matching_user_id)
      ->pluck('matching_id');


  // なければ作成する
  if ($matching_id->isEmpty()){

      Matching::create(); //チャットルーム作成

      $latest_matching = Matching::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得

      $matching_id = $latest_matching->id;

      // 新規登録 モデル側 $fillableで許可したフィールドを指定して保存
      MatchingUser::create(
      ['matching_id' => $matching_id,
      'user_id' => Auth::id()]);

      MatchingUser::create(
      ['matching_id' => $matching_id,
      'user_id' => $matching_user_id]);

      Message::create(
      ['matching_id' => $matching_id,
      'user_id' => Auth::id(),
      'text' => null]);
  }

  // チャットルーム取得時はオブジェクト型なので数値に変換
  if(is_object($matching_id)){
      $matching_id = $matching_id->first();
  }

  // チャット相手のユーザー情報を取得
  $matching_user = User::findOrFail($matching_user_id);
  // チャット相手のユーザー名を取得(JS用)
  $matching_user_name = $matching_user->name;

  $messages = Message::where('matching_id', $matching_id)
  ->orderby('created_at')
  ->get();

  $user = Auth::user()->id;


  return view('message.show',
  compact('matching_id', 'matching_user',
  'matching_user_name','messages','user'));

  }
  public function list($matching_id)
  {
    $messages = Message::with('user')
    ->where('matching_id', $matching_id)
    ->orderby('created_at')
    ->whereNotNull('text')
    ->get();
    //dd($messages);
    return response()->json($messages);


  }
  public static function store(Request $request)
  {


      $message = new Message();
      $message->matching_id = $request->matching_id;
      $message->user_id = Auth::user()->id;
      $message->text = $request->text;
      $message->save();
      event(new MessageCreated($message));

    return ["message" => $message];

}
}
