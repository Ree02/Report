<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Http\Requests\CreateSubject;

class SubjectController extends Controller
{
    //科目作成ページ画面を返す
    public function showCreateFrom ()
    {
        return view('subjects/create');
    }

    //科目作成フォームを送信
    public function create(CreateSubject $request)
    {
        $subject = new Subject();

        $subject->title = $request->title;

        //インスタンスの状態をデータベースに書き込む
        $subject->save();

        //課題一覧ページに遷移
        return redirect()->route('reports.index', [
            'id' => $subject->id,
        ]);
    }
    
    public function showEditForm(int $id){
        // 指定した科目を取得
        $subject = Subject::find($id);

        // subjectファイルのedit.blade.phpに指定した科目を渡す
        return view('subjects/edit', [
            'subject' => $subject,
        ]);
    }

    public function edit(int $id, CreateSubject $request)
    {
        // 指定したレポートのレコードを取得
        $subject = Subject::find($id);

        // 入力した値に書き換え
        $subject->title = $request->input('title');

        //入力した値に更新
         $subject->save();

        //課題一覧ページに遷移
        return redirect()->route('reports.index', [
            'id' => $subject->id,
        ]);
    }
}