@extends('layouts.app')



マッチングしたユーザー<br>
@foreach($matching_users as $user)
    {{$user->name}}<br>
    <form method="POST" action="{{ route('message.show') }}">
    @csrf
      <input name="user_id" type="hidden" value="{{$user->id}}">
      <button type="submit" class="chatForm_btn">チャットを開く</button>
    </form>

@endforeach
<br>
