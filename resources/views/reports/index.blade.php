<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">{{ config('app.name') }}</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">科目
            <a href="#">
               <span class="glyphicon glyphicon-plus color" aria-hidden="true"></span>
            </a>
          </div>
          <div class="list-group">
            @foreach($subjects as $subject)
              <a 
              href="{{ route('reports.index', ['id' => $subject->id]) }}" 
              class="list-group-item {{ $current_subject_id === $subject->id ? 'active' : ''}}" 
              >
                {{ $subject->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">課題
          <a href="#">
            <span class="glyphicon glyphicon-plus color" aria-hidden="true"></span>
          </a>
        </div>
          <div class="panel-body">
            <div class="text-right">
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>タイトル</th>
                <th>状態</th>
                <th>期限</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)
                <tr>
                  <td>{{ $report->title }}</td>
                  <td>
                    <span class="label {{ $report->status_class }}">{{ $report->status_label}}</span>
                  </td>
                  <td>{{ $report->formatted_due_date }}</td>
                  <td>            <a href="#">
               <span class="glyphicon glyphicon-pencil color-edit" aria-hidden="true"></span>
            </a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>