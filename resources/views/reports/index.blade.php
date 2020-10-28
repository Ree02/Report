@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
    <div class="column col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">科目
          <a href="{{ route('subjects.create') }}">
            <span class="glyphicon glyphicon-plus color" aria-hidden="true"></span>
          </a>
        </div>
          <div class="panel-body">
            <div class="text-right">
            </div>

          <table class="table">
            <tbody>
              @foreach($subjects as $subject)
                <tr>
                  <td class = "subject">
                    <a 
                      href="{{ route('reports.index', ['id' => $subject->id]) }}" 
                      class="list-group-item {{ $current_subject_id === $subject->id ? 'active' : ''}}" style="border: none"
                    >
                      {{ $subject->title }}
                    </a>
                  </td>
                  <td class = "subject">
                    <a href="{{ route('reports.index', ['id' => $subject->id]) }}">
                      <span class="glyphicon glyphicon-pencil color-edit" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <div class="column col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">課題
          <a href="{{ route('reports.create', ['id' => $current_subject_id]) }}">
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
                <th>詳細</th>
                <th>状態</th>
                <th>期限</th>
                <th>    </th>
              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)
                <tr>
                  <td>{{ $report->title }}</td>
                  <td>{{ $report->detail }}</td>
                  <td><span class="label {{ $report->status_class }}">{{ $report->status_label}}</span></td>
                  <td>{{ $report->formatted_due_date }}</td>
                  <td>
                    <a href="{{ route('reports.edit', ['id' => $report->subject_id, 'report_id' => $report->id]) }}">
                      <span class="glyphicon glyphicon-pencil color-edit" aria-hidden="true"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection