<!-- 投稿フォームのエラー表示 -->
@if($errors->any())
<div>
    <ul>
    @foreach($errors->all() as $error)
    <li style="color: red;">{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<div class="profile-box">
  <img class="user-icon" src="{{ asset('storage/'. $user->icon_image) }}" alt="{{ $user->username }}さん">

  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-flex">
      <p>ユーザー名</p>
      <input type="text" name="username" value="{{ old('username', $user->username) }}">
    </div>
    <div class="form-flex">
      <p>メールアドレス</p>
      <input type="text" name="email" value="{{ old('email', $user->email) }}">
    </div>
    <div class="form-flex">
      <p>パスワード</p>
      <input type="password" name="password" placeholder="パスワードを入力">
    </div>
    <div class="form-flex">
      <p>パスワード確認</p>
      <input type="password" name="password_confirmation" placeholder="もう一度パスワードを入力">
    </div>
    <div class="form-flex">
      <p>自己紹介</p>
      <input type="text" name="bio" value="{{ old('bio', $user->bio) }}">
    </div>
    <div class="form-flex">
      <p>アイコン画像</p>
      <input type="file" name="icon_image">
    </div>
    <input type="submit" value="更新" class="btn btn-danger">
  </form>
</div>

</x-login-layout>
