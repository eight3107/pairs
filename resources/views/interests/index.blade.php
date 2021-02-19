@extends('layouts.app')

<h1>検索</h1>
 
<form action="{{url('/interests')}}" method="GET">
    <p><input type="text" name="keyword" value="{{$keyword}}"></p>
    <p><input type="submit" value="検索"></p>
</form>

<a href="{{ route('interests.mypage' ) }}">参加中のコミュニティ</a><br><br>
コミュニティ一覧<br><br>

@foreach ($interests as $interest)

<a href="{{ route('interests.show',$interest->id ) }}">#{{ $interest->name }}</a>
<form action="{{ route('interests.join',$interest->id ) }}" method="post" class="d-inline">
@csrf
  <button class="btn btn-danger" onclick='return confirm("参加しますか？");'>{{ __('参加する')  }}</button>
</form>
<br><br>
@endforeach
