@extends('layouts.app')

<!-- 既にいいねした人、マッチングした人どうするか？-->

@foreach($users as $user)
    {{$user->name}}
    {{$user->age}}歳
    <a class="aaaaaaaaa"   href="/goods/{{ $user->id }}/create">いいね</a><br>
@endforeach
<br>
<br>

@foreach($users as $user)
    {{$user->name}}
    {{$user->age}}歳
    <a class="aaaaaaaaa"   href="/goods/{{ $user->id }}/matching">いいねありがとう</a><br>
@endforeach
