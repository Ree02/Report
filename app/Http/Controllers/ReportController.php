<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Report;
use App\Http\Requests\CreateReport;
use App\Http\Requests\EditReport;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(int $id)
    {
        //現在認証されているユーザの取得
        $user = Auth::user();
        //現在認証されているユーザの取得
        $user_id = Auth::id();

        //ユーザの全ての科目を取得
        $subjects = $user->subjects()->get();
        //ユーザの〆切の近い課題を取得
        $deadline_reports = Report::User($user_id)->DeadlineStatus()->DeadlineDueDateGreaterThan()->DeadlineDueDateLessThan()->get();

        if ($id != 0){
            //選ばれたフォルダを取得
            $current_subject = Subject::find($id);
            //選ばれたフォルダに紐づくタスクを取得
            $reports = $current_subject->reports()->get();

            return view('reports/index', [
                'subjects' => $subjects,
                'current_subject_id' => $id,
                'reports' => $reports,
                'deadline_reports' => $deadline_reports,
            ]);
        }
        else {
            return view('reports/index', [
                'subjects' => $subjects,
                'current_subject_id' => 0,
                'deadline_reports' => $deadline_reports,
            ]);
        }
    }

    public function showCreateForm(int $id){
        return view('reports/create', [
            'subject_id' => $id
        ]);
    }

    public function create(int $id, CreateReport $request)
    {
        //現在認証されているユーザの取得
        $user = Auth::user();

        $current_subject = Subject::find($id);

        $report = new Report();
        $report->title = $request->title;
        $report->detail = $request->detail;
        $report->due_date = $request->due_date;
        $report->subject_id = $current_subject->id;

        //インスタンスの状態をデータベースに書き込む
        $user->reports()->save($report);

        $current_subject->reports()->save($report);

        return redirect()->route('reports.index', [
            'id' => $current_subject->id,
        ]);
    }

    public function showEditForm(int $report_id){
        //選ばれた課題を取得
        $report = Report::find($report_id);

        return view('reports/edit', [
            'report' => $report,
        ]);
    }

    public function edit(int $report_id, EditReport $request)
    {
        // 指定したレポートのレコードを取得
        $report = Report::find($report_id);

        // 「確定」ボタン押下時の処理
        if($request->has("send")){
            // 入力した値に書き換え
            $report->title = $request->title;
            $report->status = $request->status;
            $report->due_date = $request->due_date;
            $report->detail = $request->detail;
            
            //入力した値に更新
            $report->save();
        }
        
        // 「削除」ボタン押下時の処理
        elseif($request->has("delete")){
            $report->delete();
        }

        return redirect()->route('reports.index', [
            'id'=> $report->subject_id,
        ]);
    }
}