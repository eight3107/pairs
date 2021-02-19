@extends('layouts.app')

いいねしたユーザー
<br>
@foreach($users as $user)
{{ $user->receiveuser->name }}
<br>

@endforeach
