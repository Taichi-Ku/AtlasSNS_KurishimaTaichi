@props(['user', 'followCount', 'followerCount'])
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title>SNS課題</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL"/>
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation', ['user' => $user])
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div class="side-bar-top">
        <p>{{ $user->username }}さんの</p>
        <div>
          <p>フォロー数</p>
          <p>{{ $followCount }}名</p>
        </div>
        <a class="btn btn-primary" href="{{ route('follow.list') }}">フォローリスト</a>
        <div>
          <p>フォロワー数</p>
          <p>{{ $followerCount }}名</p>
        </div>
        <a class="btn btn-primary" href="{{ route('follower.list') }}">フォロワーリスト</a>
      </div>
      <a href="{{ route('user.search.form') }}" class="btn btn-primary">ユーザー検索</a>
    </div>
  </div>
  <footer>
    <!-- フッターの内容が入る -->
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
