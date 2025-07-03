<x-login-layout :user="$loginUser" :followCount="$followCount" :followerCount="$followerCount">
  <div class="user-profile-header">
    <!-- ユーザーアイコン -->
    <img class="user-icon" src="{{ asset('images/' . $user->icon_image) }}" alt="{{ $user->username }}さん">
    <!-- ユーザー情報 -->
    <table class="user-info">
      <tr>
        <td>ユーザー名</td>
        <td>{{ $user->username }}</td>
      </tr>
      <tr>
        <td>自己紹介</td>
        <td>{{ $user->bio }}</td>
      </tr>
    </table>

    <!-- フォローボタン -->
    @auth
      @if (Auth::id() !== $user->id)
        @if ($loginUser->followings->contains($user->id))
          <form action="{{ route('unfollow', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', $user) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
        @endif
      @endif
    @endauth
  </div>
</x-login-layout>
