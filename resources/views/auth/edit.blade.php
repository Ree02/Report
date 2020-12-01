@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">ユーザ情報を編集する</div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('users.edit') }}" method="post">
                        <div class="col-sm-5">
                            @csrf
                            <img src="{{ asset('storage/profiles/'. Auth::user()->profile_image) }}" alt="プロフィール画像">
                        </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="name">ユーザー名 </label>
                                    @error('name')
                                    <div class="alert-message">
                                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" />
                                    <label for="title">メールアドレス </label>
                                    @error('email')
                                    <div class="alert-message">
                                        <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-ok" name="send">確定</button>
                            <button type="submit" class="btn btn-ok" name="delete">アカウント削除</button>
                        </div>
                    </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
@endsection