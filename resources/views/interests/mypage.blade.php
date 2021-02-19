@extends('layouts.app')

参加中のコミュニティ一覧<br><br>




@foreach ($interests as $interest)
{{ $interest->name }}
<form action="{{ route('interests.delete',$interest->id ) }}" method="post" class="d-inline">
@csrf
  <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('退会する')  }}</button>
</form>
@endforeach
<!-- 一つも参加してない時の対応 -->
