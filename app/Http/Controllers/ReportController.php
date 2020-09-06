<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Report;
use App\Http\Requests\CreateReport;

class ReportController extends Controller
{
    public function index(int $id)
    {
        //全てのフォルダを取得
        $subjects = Subject::all();
        
        //選ばれたフォルダを取得
        $current_subject = Subject::find($id);

        //選ばれたフォルダに紐づくタスクを取得
        $reports = $current_subject->reports()->get();

        return view('reports/index', [
            'subjects' => $subjects,
            'current_subject_id' => $id,
            'reports' => $reports,
        ]);
    }

    public function showCreateForm(int $id){
        return view('reports/create', [
            'subject_id' => $id
        ]);
    }

    public function create(int $id, CreateReport $request)
    {
        $current_subject = Subject::find($id);

        $report = new Report();
        $report->titile = $request->title;
        $report->due_date = $request->due_date;

        $current_subject->reports()->save($report);

        return redirect()->route('reports.index', [
            'id' => $current_subject->id,
        ]);
    }
}
