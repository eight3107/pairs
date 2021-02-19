@extends('layouts.app')
<div id="app">


<div class="age-search">
  <form action="{{url('/users/index')}}" method="GET">
      <input type="number" name="underage" value="{{$underage}}" class="btn-age">歳以上
      <span>
      <input type="number" name="overage" value="{{$overage}}" class="btn-age">歳以下
    </span>
      <input type="submit" value="検索" class="btn-search">
  </form>
</div>

<ul class="user">
  @foreach($users as $user)
  <li class="user-list">

    <div><profile-component :user="{{ json_encode($user)}}"/></div>
      <div class="user-button">
        <good-component :user="{{ json_encode($user)}}" />
      </div>
    
  </li>
  @endforeach

</ul>

  {{ $users->links('vendor.pagination.default') }}
<br>
</div>
