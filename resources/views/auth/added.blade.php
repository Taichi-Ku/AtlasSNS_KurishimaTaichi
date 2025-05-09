<x-logout-layout>
  <div id="clear">
    <!-- ユーザー名を表示 -->
    @if (session('registered_username'))
      <h1>{{ session('registered_username') }}さん</h1>
    @else
      <h1>ゲストさん</h1>
    @endif

    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <p class="btn"><a href="login">ログイン画面へ</a></p>
  </div>
</x-logout-layout>
