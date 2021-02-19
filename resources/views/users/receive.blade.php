@extends('layouts.app')

いいねが来たユーザー一覧<br><br>
@foreach($users as $user)
{{ $user->senduser->name }}
<a class="aaaaaaaaa"   href="/goods/{{ $user->senduser->id }}/matching">いいねありがとう</a><br>


@endforeach
