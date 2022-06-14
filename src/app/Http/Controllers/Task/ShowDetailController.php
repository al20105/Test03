<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;

class ShowDetailController extends Controller
{
    use GetUser;

    public function ShowTaskWD() { //M3 詳細表示UI処理
        return view('tasks.show');
    }
}