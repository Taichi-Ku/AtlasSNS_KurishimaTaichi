<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<div class="search-form separate-page-line">
  <form action="{{ route('user.search') }}" method="post">
    @csrf
    <input type="text" name="keyword" class="" placeholder="ユーザー名">
    <button type="submit" class="none-button-bg">
      <img src="{{ asset('images/search.png') }}" alt="検索" class="action-img-size">
    </button>
  </form>
  @if(!empty($keyword))
  <p class="search-keyword">検索ワード：{{ $keyword }}</p>
  @endif
</div>

<div class="search-content">
  @foreach ($users as $user_solo)
    <div class="search-user-box">
      <div class="search-user-box-left">
        <img class="user-icon-size" src="{{ asset('storage/'. $user_solo->icon_image) }}" alt="{{ $user_solo->username }}さん">
        <div class="user-name">{{ $user_solo->username }}</div>
      </div>
      @auth
        @if ($user->followings->contains($user_solo->id))
          <!-- フォロー解除ボタン -->
          <form action="{{ route('unfollow', $user_solo) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @else
          <!-- フォローするボタン -->
          <form action="{{ route('follow', $user_solo) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
        @endif
      @endauth
    </div>
  @endforeach
</div>

</x-login-layout>
