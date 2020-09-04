<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class ReportController extends Controller
{
    public function index(int $id)
    {
        $subjects = Subject::all(); 

        return view('reports/index', [
            'subjects' => $subjects,
            'current_subject_id' => $id,
        ]);
    }
}
