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
          <div class="panel-heading">課題を編集する</div>
          <div class="panel-body">
              @csrf
              <div class="form-group">
                @foreach ($report as $report)
                <label for="title">タイトル</label>
                 @error('title')
                   <div class="alert-message">
                     <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                     {{$message}}
                   </div>
                 @enderror
                <input type="text" class="form-control" name="title" id="title" value="{{ $report->title }}" autocomplete="off" />
              </div>
              <div class="form-group">
                <label for="title">期日</label>
                 @error('due_date')
                   <div class="alert-message">
                     <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                     {{$message}}
                   </div>
                 @enderror
                <div class='input-group date' id='datetimepicker1'>
                  <input type="text" class="form-control" name="due_date" id="due_date" value="{{ $report->due_date }}" autocomplete="off" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label for="title">詳細</label>
                @error('detail')
                   <div class="alert-message">
                     <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
                     {{$message}}
                   </div>
                 @enderror
                <textarea class="form-control" name="detail" id="detail" autocomplete="off" cols="25" rows="4"/>{{ $report->detail }}</textarea>
              </div>
              @endforeach
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