<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<!-- 投稿フォームのエラー表示 -->
@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="post-form separate-page-line">
  <img src="{{ asset('storage/' . $user->icon_image) }}" alt="ログインユーザーアイコン"  class="user-icon-size">

  {{ Form::open(['url' => '/post/create', 'class' => 'post-form-body']) }}
    {{ Form::hidden('user_id', $user->id) }}
    {{ Form::textarea('post', null, ['class' => 'post-textarea', 'placeholder' => '投稿内容を入力してください。']) }}

    <button type="submit" class="none-button-bg">
      <img src="{{ asset('images/post.png') }}" alt="投稿" class="action-img-size">
    </button>
  {{ Form::close() }}
</div>

<!-- 投稿一覧 -->
<div class="post-area">
  <ul>
    @foreach ($posts as $post)
      <li class="post-block">
        <img src="{{ asset('storage/'. $post->user->icon_image) }}" alt="{{ $post->user->usernΩame }}さん" class="user-icon-size">
        <div class="post-content">
          <div class="post-header">
            <p>{{ $post->user->username }}さん</p>
            <p>{{ $post->created_at }}</p>
          </div>

          <div class="post-body">
            <p>{!! nl2br(e($post->post)) !!}</p>
          </div>

          @if($post->user_id == $user->id)
          <div class="post-actions">
            <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
              <img src="{{ asset('images/edit.png') }}" alt="更新" class="action-img-size">
            </a>
            <a href="/post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" class="delete-btn">
              <img src="{{ asset('images/trash.png') }}" alt="削除" class="action-img-size trash-default">
              <img src="{{ asset('images/trash-h.png') }}" alt="削除" class="action-img-size trash-hover">
            </a>
          </div>
          @endif
        </div>
      </li>
    @endforeach
  </ul>
</div>

<!-- モーダル -->
<div class="my-modal js-modal">

  <div class="modal__bg js-modal-close"></div>

  <form action="{{ route('post.update') }}" method="post" class="modal__content">
    @csrf
    <textarea name="up-post" class="modal_post"></textarea>
    <input type="hidden" name="post-id" class="modal_id" value="">
    <button type="submit" class="none-button-bg">
      <img src="{{ asset('images/edit.png') }}" alt="更新" class="action-img-size">
    </button>
  </form>

</div>

</x-login-layout>
