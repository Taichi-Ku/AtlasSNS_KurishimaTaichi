<x-login-layout :user="$user" :followCount="$followCount" :followerCount="$followerCount">

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
