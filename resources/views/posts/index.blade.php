<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

<!-- 投稿フォーム -->
@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li style="color: red;">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

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
      <img src="{{ asset('images/post.png') }}" alt="投稿" class="img-size">
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
          <div>
            <div>{{ $post->post }}</div>
            @if($post->user_id == $user->id)
              <div class="post-action">
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                  <img src="{{ asset('images/edit.png') }}" alt="更新" class="img-size">
                </a>
                <a href="/post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                  <img src="{{ asset('images/trash.png') }}" alt="削除" class="img-size">
                </a>
              </div>
            @endif
          </div>
        </div>
      </li>
    @endforeach
  </ul>
</div>

<!-- モーダル -->
<div class="my-modal js-modal">

  <div class="modal__bg js-modal-close"></div>

  <form action="/post/update" method="post" class="modal__content">
    @csrf
    <textarea name="up-post" class="modal_post"></textarea>
    <input type="hidden" name="post-id" class="modal_id" value="">
    <button type="submit" class="">
      <img src="{{ asset('images/edit.png') }}" alt="更新" class="img-size">
    </button>
  </form>

</div>


</x-login-layout>
