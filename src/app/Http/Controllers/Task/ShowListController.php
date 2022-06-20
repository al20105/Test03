<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;

class ShowListController extends Controller
{
    use GetUser;

    public function ShowListWD() { //M3 一覧表示UI処理

        $tasks = $this->user->tasks;

        return view('tasks.index',compact('tasks'));
    }
}