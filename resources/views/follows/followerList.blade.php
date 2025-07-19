<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

  <div class="follow-list-header">
    <h2>フォロワーリスト</h2>

    <div class="follow-list-header-icon">
      @foreach($followers as $followerUser)
        <a href="{{ route('other-profile.show', $followerUser) }}">
          <img src="{{ asset('storage/'. $followerUser->icon_image) }}" alt="{{ $followerUser->username }}">
        </a>
      @endforeach
    </div>
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
