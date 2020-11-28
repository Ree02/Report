<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUserForm()
    {
        return view('auth/user');
    }

    public function user()
    {
        User::find(Auth::id())->delete();
        return redirect('/login');
    }
}
