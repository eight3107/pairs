<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Good;
use Illuminate\Support\Facades\Auth;

class GoodController extends Controller
{
  public function create(Request $request)
  {
      $good = new Good;
      $good->send_id = Auth::user()->id;
      $good->receive_id = $request->receive_user_id;
      $good->save();


      return redirect()->to('users/index');
  }

  public function matching($receive_id)
  {
    $good = Good::where('send_id', $receive_id )->where('receive_id', Auth::id())->first();
    //マッチングが成立したらstatus0→1
    $good->status = 1;
    $good->save();
    return redirect()->to('/matching');
  }

  public function hasgood ($id)
      {


        $user = User::find($id);
        $user = $user->id;
        $send_good_ids = Good::where([
          ['send_id',Auth::id()],
          ['status',0],['receive_id',$user]
        ])->count();

          if ($send_good_ids == 0) {
              $result = true;
          } else {
              $result = false;
          }


          return response()->json($result);
      }

}
