@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">ユーザ情報</div>
      <div class="panel-body">
        <form action="{{ route('users') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-5">
              <img src="{{ asset('storage/profiles/'. Auth::user()->profile_image) }}" alt="プロフィール画像">
            </div>
            <div class="col-sm-7">
              <table class="table">
                <tbody>
                  <tr><td>ユーザ名 : </td><td>{{ Auth::user()->name }}</td></tr>
                  <tr><td>メールアドレス : </td><td>{{ Auth::user()->email }}</td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-ok" name="delete">アカウント削除</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection