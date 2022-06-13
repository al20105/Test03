<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RedirectsUsers;

class ShowFileController extends Controller
{
    use GetUser;

    public function ShowListWD() { //M3 一覧表示UI処理
        return view('tasks.index');
    }
}