@extends('layouts.app')
@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_user" enctype="multipart/form-data" action="/users/update" accept-charset="UTF-8" method="post">
          <input name="utf8" type="hidden" value="✓" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          {{csrf_field()}}
          <div class="form-group">
            <label for="user_pic">プロフィール写真</label><br>
                @if ($user->pic)
                    <p>
                        <img src="{{ asset('storage/user_images/' . $user->pic) }}" alt="avatar" width="180" height="200"/>
                    </p>
                @endif
            <input type="file" name="user_pic"  value="{{ old('user_pic',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
          </div>

          <div class="form-group">
            <label for="user_name">名前</label>
            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
          </div>
          <div class="form-group">
            <label for="user_sentence">自己紹介</label>
            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_sentence',$user->sentence) }}" name="user_sentence" />
          </div>

          {!! Form::select('prefecture_id', $prefectures) !!}

          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
