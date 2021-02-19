@extends('layouts.app')
<div id="app">

名前{{ $user->name }} <br>
年齢{{ $user->age }}  <br>
居住地{{ $user->prefecture->name }}<br>

コミュニティ
@foreach($user->interests as $interest)
{{ $interest->name }}
@endforeach




        <div class="col-md-4 text-center">
      @if ($user->pic)
        <p>
          <img class="round-img" src="{{ asset('storage/user_images/' . $user->pic) }}" width="180" height="200">
        </p>
        @else
          <img class="round-img" src="{{ asset('storage/user_images/noimage.png') }}"width="180" height="200">
      @endif
    </div>
    <good-component
        :user="{{ json_encode($user)}}"
    ></good-component>
</div>
