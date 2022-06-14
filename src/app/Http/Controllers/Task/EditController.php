<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    use GetUser;

    public function ShowTaskEditWD() { //M6 課題編集画面表示UI処理
        return view('tasks.edit');
    }

    public function TaskEdit(Request $request) { //M18 課題編集処理
        return redirect('/tasks');
    }
}