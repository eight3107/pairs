@extends('layouts.app')


<div id ="app">

<span>{{$matching_user_name}}さんとのメッセージ</span>
<br><br>



<!--
@foreach($messages as $message)
    {{$message->user->name}}
    {{$message->text}}
    <br><br>


    @endforeach
-->
<!--
    <form action="{{ route('message.store',$message->matching_id) }}"  method="post">

      @csrf
      <textarea name="text" cols="30" rows="3"></textarea>
      <input type="submit" value="送信" class="btn btn-send">
    </form>
-->


    <messagesend-component
    :user="{{ json_encode($user)}}"
    :messages="{{ json_encode($messages)}}"
    :matching_id="{{ json_encode($matching_id)}}"
    ></messagesend-component>


</div>
