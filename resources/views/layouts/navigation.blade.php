<div id="head">
    <div class="head-left">
        <a href="{{ url('/top') }}">
            <img src="{{ asset('images/atlas.png') }}" alt="ロゴ">
        </a>
    </div>
    <div class="head-right">
        <p class="username">{{ $user->username }} さん</p>
        <button class="accordion-button" onclick="toggleAccordion(this)">
            <span class="accordion-arrow"></span>
        </button>
        <img src="{{ asset('storage/' . $user->icon_image) }}" alt="ログインユーザーアイコン" class="user-icon-size">
    </div>

    <div class="accordion-content">
        <ul>
            <li><a href="{{ url('/top') }}">HOME</a></li>
            <li><a href="{{ url('/profile') }}">プロフィール編集</a></li>
            <li><a href="{{ url('/logout') }}">ログアウト</a></li>
        </ul>
    </div>
</div>
