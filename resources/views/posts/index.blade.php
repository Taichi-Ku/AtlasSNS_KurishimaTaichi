<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<!-- 投稿フォーム -->
<div class="post-form">

  <div class="user-icon">
    <img src="{{ asset('images/' . $user->icon_image) }}" alt="ログインユーザーアイコン">
  </div>

  {{ Form::open(['url' => '/post/create', 'class' => 'post-form-body']) }}

    {{ Form::hidden('user_id', $user->id) }}
    {{ Form::textarea('post', null, [
      'class' => 'post-textarea',
      'placeholder' => '投稿内容を入力してください。',
      'rows' => 5,
      'cols' => 125,
    ]) }}

    <button type="submit" class="post-submit-button">
      <img src="{{ asset('images/post.png') }}" alt="投稿">
    </button>

  {{ Form::close() }}

</div>


<!-- 投稿一覧 -->
<div>
  <ul>
    @foreach ($posts as $post)
    <li class="post-block">
      <figure><img src="{{ asset('images/'. $post->user->icon_image) }}" alt="{{ $post->user->username }}さん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">{{ $post->user->username }}さん</div>
          <div>{{ $post->created_at }}</div>
        </div>
        <td>{{ $post->post }}</td>
      </div>
    </li>
    @endforeach
  </ul>
</div>

</x-login-layout>
