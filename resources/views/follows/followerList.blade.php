<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

  <div class="follow-list-header separate-page-line">
    <h2>フォロワーリスト</h2>

    <div class="follow-list-header-icon">
      @foreach($followers as $followerUser)
        <a href="{{ route('other-profile.show', $followerUser) }}">
          <img src="{{ asset('storage/'. $followerUser->icon_image) }}" alt="{{ $followerUser->username }}" class="user-icon-size">
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
