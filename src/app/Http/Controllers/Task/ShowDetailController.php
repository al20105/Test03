<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ShowDetailController extends Controller
{
    use GetUser;

    public function ShowTaskWD($id) { //M3 詳細表示UI処理
        $task = Task::find(Crypt::decrypt($id))->first();
        return view('tasks.show', compact('task'));
    }
}