<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Interest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InterestsController extends Controller
{
    public function index(Request $request){
      $keyword = $request->input('keyword');
      $myinterests = Auth::user()->interests()->get();

      if (!empty($keyword)) {
        $interests = DB::table('interests')
        ->orWhere('name', 'LIKE', "%{$keyword}%")
        ->whereNotIn('id', $myinterests)
        ->get();
      }
      if (empty($keyword)) {
        $interests = DB::table('interests')
        ->whereNotIn('id', $myinterests)->get();
      }
      return view('interests.index', compact('interests', 'keyword'));
    }

    public function mypage(){
        $interests = Auth::user()->interests()->get();
        return view('interests.mypage', compact('interests'));
    }

    public function show($id)
    {
      $user = Auth::user();

      if(
        $user->gender == 0 ) {
        $target_gender = 1;
      }

      if(
        $user->gender ===1) {
        $target_gender = 0;
      }

        $interest = Interest::find($id);
        $usercount = $interest->users->count();
        $targetusers = $interest->users->where('gender',$target_gender);
        $targetcount = $targetusers->count();
        // $registers = $interest->users->get();
        //$registerscount = $registers->count();
        //dd($targetcount);
        return view('interests.show', compact('interest','usercount','targetusers','targetcount'));
    }

    public function add($id)
    {
        $interest = Auth::user()->interests()->attach($id);


        return redirect('/interests');
    }


    public function destroy($id)
    {
        $interest = Auth::user()->interests()->detach($id);


        return redirect('/interests')->with('flash_message', __('Deleted.'));
    }

}
