<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

  <div class="follow-list-header separate-page-line">
    <h2>フォローリスト</h2>

    <div class="follow-list-header-icon">
      @foreach($followings as $followUser)
        <a href="{{ route('other-profile.show', $followUser) }}">
          <img src="{{ asset('storage/'. $followUser->icon_image) }}" alt="{{ $followUser->username }}" class="user-icon-size">
        </a>
      @endforeach
    </div>
  </div>

  <ul>
    @foreach ($posts as $post)
      <li class="post-block">
        <a href="{{ route('other-profile.show', $post->user->id) }}">
          <img src="{{ asset('storage/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん" class="user-icon-size">
        </a>
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
