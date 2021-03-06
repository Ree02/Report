@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">科目を追加する</div>
            <div class="panel-body">
              <form action="{{ route('subjects.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="title">科目名 </label>
                   @error('title')
                   <div class="alert-message">
                     <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                     {{$message}}
                   </div>
                 @enderror
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-ok">OK</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
@endsection