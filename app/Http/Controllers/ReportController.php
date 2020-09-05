<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Report;

class ReportController extends Controller
{
    public function index(int $id)
    {
        //全てのフォルダを取得
        $subjects = Subject::all();
        
        //選ばれたフォルダを取得
        $current_subject = Subject::find($id);

        //選ばれたフォルダに紐づくタスクを取得
        $reports = Report::where('subject_id', $current_subject->id)->get();

        return view('reports/index', [
            'subjects' => $subjects,
            'current_subject_id' => $id,
            'reports' => $reports,
        ]);
    }
}
