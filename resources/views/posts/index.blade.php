<x-login-layout>

  <h2>機能を実装していきましょう。</h2>

  <form action="/logout" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
  </form>

</x-login-layout>
