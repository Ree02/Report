@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">パスワード再発行</div>
          <div class="panel-body">
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}" />
              <div class="form-group">
                <label for="email">メールアドレス</label>
                @error('email')
                   <div class="alert-message">
                     <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                     {{$message}}
                   </div>
                 @enderror
                <input type="text" class="form-control" id="email" name="email" />
              </div>
              <div class="form-group">
                <label for="password">新しいパスワード</label>
                @error('password')
                    <div class="alert-message">
                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        {{$message}}
                    </div>
                @enderror
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="form-group">
                <label for="password-confirm">新しいパスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-ok">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection