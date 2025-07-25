<x-logout-layout>
  <div class="form-bg">
    <!-- ユーザー名を表示 -->
    <div class="add-top">
      @if (session('registered_username'))
        <p>{{ session('registered_username') }}さん</p>
      @else
        <p>ゲストさん</p>
      @endif
      <p>ようこそ！AtlasSNSへ！</p>
    </div>

    <div class="add-bottom">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>

    <div class="btn-center">
      <a href="login" class="btn btn-danger">ログイン画面へ</a>
    </div>
  </div>
</x-logout-layout>
