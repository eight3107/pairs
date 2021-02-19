@extends('layouts.app')




{{ $interest->name }}
<br>参加者
@foreach($targetusers as $user)
{{ $user->name }}

@endforeach
<br>参加者{{$usercount}}人
(異性{{$targetcount}}人)