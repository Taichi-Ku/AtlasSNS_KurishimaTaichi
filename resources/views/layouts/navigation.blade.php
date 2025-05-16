<style>
  .accordion-button {
    background: #f8f9fa;
    padding: 12px;
    cursor: pointer;
    width: 100%;
    border: none;
    text-align: left;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 16px;
  }

  .accordion-arrow {
    transition: transform 0.3s ease;
    font-size: 14px;
  }

  .accordion-arrow.open {
    transform: rotate(180deg);
  }

  .accordion-content {
    display: none;
    padding: 12px;
    border: 1px solid #ddd;
    background: #fff;
  }
</style>

<div id="head">
    <h1><a href="{{ url('/top') }}"><img src="images/atlas.png"></a></h1>
    <div id="">
        <div id="">
            <p>〇〇さん</p>
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

<script>
  function toggleAccordion(button) {
    const content = button.nextElementSibling;
    const arrow = button.querySelector('.accordion-arrow');

    // トグル表示
    const isOpen = content.style.display === "block";
    content.style.display = isOpen ? "none" : "block";

    // 矢印の回転
    if (isOpen) {
      arrow.classList.remove('open');
    } else {
      arrow.classList.add('open');
    }
  }
</script>
