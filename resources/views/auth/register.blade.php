<x-logout-layout>

<!-- エラー表示 -->
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>・{{ $error }}</li>
        @endforeach
    </ul>
@endif

    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => 'register','class' => 'form-bg']) !!}

<p class="form-title">新規ユーザー登録</p>

<div class="login-form">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="login-form">
    {{ Form::label('メールアドレス') }}
    {{ Form::email('email',null,['class' => 'input']) }}
</div>
<div class="login-form">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}
</div>
<div class="login-form">
    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
</div>

<div class="form-btn">
    {{ Form::submit('新規登録', ['class' => 'btn btn-danger']) }}
</div>

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</x-logout-layout>
