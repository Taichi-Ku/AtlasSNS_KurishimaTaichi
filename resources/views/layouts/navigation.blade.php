<div id="head">
    <h1><a href="{{ url('/top') }}"><img src="images/atlas.png"></a></h1>
    <div id="">
        <div id="">
            <p>{{ $user->username }}さん</p>
        </div>

        <!-- アコーディオン1 -->
        <button class="accordion-button" onclick="toggleAccordion(this)">
          <span class="accordion-arrow">\/</span>
        </button>
        <div class="accordion-content">
            <ul>
                <li><a href="{{ url('/top') }}">ホーム</a></li>
                <li><a href="{{ url('/profile') }}">プロフィール</a></li>
                <li><a href="{{ url('/logout') }}">ログアウト</a></li>
            </ul>
        </div>

    </div>
</div>
