<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUser;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth/user');
    }

    public function showEditForm()
    {
        $auth = Auth::user();
        return view('auth/edit', ['auth' => $auth]);
    }

    public function edit(EditUser $request)
    {
        $user = Auth::user();

        // 「確定」ボタン押下時の処理
        if ($request->has("send")){
            // 入力した値に書き換え
            $user->name = $request->name;
            $user->email = $request->email;

            //入力した値に更新
            $user->save();
        }
        else if ($request->has("delete")){
            User::find(Auth::id())->delete();
        }
        return redirect()->route('users');
    }

}
