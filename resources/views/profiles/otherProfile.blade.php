<x-login-layout :user="$loginUser" :followCount="$followCount" :followerCount="$followerCount">
  <div class="user-profile-header">
    <!-- ユーザーアイコン -->
    <img class="user-icon" src="{{ asset('storage/' . $user->icon_image) }}" alt="{{ $user->username }}さん">
    <!-- ユーザー情報 -->
    <table class="user-info">
      <tr>
        <th>ユーザー名</th>
        <td>{{ $user->username }}</td>
      </tr>
      <tr>
        <th>自己紹介</th>
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

  <ul>
    @foreach ($posts as $post)
      <li class="post-block">
        <a href="{{ route('other-profile.show', $post->user->id) }}">
          <img src="{{ asset('storage/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん">
        </a>
        <div class="post-content">
          <div>
            <div class="post-name">{{ $post->user->username }}さん</div>
            <div>{{ $post->created_at }}</div>
          </div>
          <div>
            <div>{{ $post->post }}</div>
          </div>
        </div>
      </li>
    @endforeach
  </ul>

</x-login-layout>
