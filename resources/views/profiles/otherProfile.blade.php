<x-login-layout :user="$loginUser" :followCount="$followCount" :followerCount="$followerCount">
  <div class="user-profile-header separate-page-line">
    <img class="user-icon-size" src="{{ asset('storage/' . $user->icon_image) }}" alt="{{ $user->username }}さん">

    <div class="user-profile-info-container">
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

      @auth
        @if (Auth::id() !== $user->id)
        <div class="follow-btn">
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
        </div>
        @endif
      @endauth
    </div>
  </div>

  <ul>
    @foreach ($posts as $post)
    <li class="post-block">
      <img src="{{ asset('storage/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん" class="user-icon-size">
      <div class="post-content">
        <div class="post-header">
          <p>{{ $post->user->username }}さん</p>
          <p>{{ $post->created_at }}</p>
        </div>

        <div class="post-body">
          <p>{!! nl2br(e($post->post)) !!}</p>
        </div>
      </div>
    </li>
    @endforeach
  </ul>

</x-login-layout>
