<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<img class="user-icon" src="{{ asset('images/'. $user->icon_image) }}" alt="{{ $user->username }}さん">

<form action="" method="post">
  @csrf
  <div class="form-flex">
    <p>ユーザー名</p>
    <input type="text" name="" class="" placeholder="{{ $user->username }}">
  </div>
  <div class="form-flex">
    <p>メールアドレス</p>
    <input type="text" name="" class="" placeholder="{{ $user->email }}">
  </div>
  <div class="form-flex">
    <p>パスワード</p>
    <input type="text" name="" class="" placeholder="">
  </div>
  <div class="form-flex">
    <p>パスワード確認</p>
    <input type="text" name="" class="" placeholder="">
  </div>
  <div class="form-flex">
    <p>自己紹介</p>
    <input type="text" name="" class="" placeholder="{{ $user->bio }}">
  </div>
  <div class="form-flex">
    <p>アイコン画像</p>
    <input type="text" name="" class="" placeholder="">
  </div>
  <input type="submit" value="更新" class="btn btn-danger">
</form>

</x-login-layout>
