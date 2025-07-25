<x-logout-layout>

  {!! Form::open(['url' => 'login','class' => 'form-bg']) !!}

  <p class="form-title">AtlasSNSへようこそ</p>

  <div class="login-form">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}
  </div>
  <div class="login-form">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div class="form-btn">
    {{ Form::submit('ログイン', ['class' => 'btn btn-danger']) }}
  </div>

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
