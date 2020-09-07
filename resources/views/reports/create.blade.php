@extends('layout')

@section('styles')
<link rel="stylesheet" type="text/css" media="screen" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">課題を追加する</div>
          <div class="panel-body">
            <form action="{{ route('reports.create', ['id' => $subject_id]) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                @if($errors->has('title'))
                  @foreach($errors->get('title') as $message)
                    <div class="alert-message">
                      <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        {{ $message }}<br>
                    </div>
			            @endforeach
                 @endif
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" autocomplete="off" />
              </div>
              <div class="form-group">
                <label for="title">期限日</label>
                @if($errors->has('due_date'))
                    <div class="alert-message">
                      <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        {{ $errors->first('due_date') }}<br>
                    </div>
                 @endif
                <div class='input-group date' id='datetimepicker1'>
                  <input type='text' class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" autocomplete="off" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label for="title">詳細</label>
                @if($errors->has('detail'))
                    <div class="alert-message">
                      <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                        {{ $errors->first('detail') }}<br>
                    </div>
                 @endif
                <textarea class="form-control" name="detail" id="detail" value="{{ old('detail') }}" autocomplete="off" cols="25" rows="4"/></textarea>
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

@section('scripts')
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="moment-ja.js"></script>
<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
  $('.date').datetimepicker({
    locale: 'ja',
    format : 'YYYY/MM/DD HH:mm'
  });
});
</script>
@endsection