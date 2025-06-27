<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

  <div class="follow-list-header">
    <h2>フォローリスト</h2>

    <div class="follow-list-header-icon">
      @foreach ($posts as $post)
        <a href="{{ route('user.show', $post->user->id) }}">
          <img src="{{ asset('images/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん">
        </a>
      @endforeach
    </div>
  </div>

  @foreach ($posts as $post)
    <li class="post-block">
        <a href="{{ route('user.show', $post->user->id) }}">
          <img src="{{ asset('images/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん">
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

</x-login-layout>
