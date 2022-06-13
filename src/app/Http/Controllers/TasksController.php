<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function ShowListWD() { //M3 一覧表示UI処理
        return view('tasks.index');
    }

    public function ShowTaskWD() { //M4 詳細表示UI処理
        return view('tasks.show');
    }

    public function ShowTaskRegisterWD() { //M5 課題登録画面表示UI処理
        return view('tasks.create');
    }

    public function ShowTaskEditWD() { //M6 課題編集画面表示UI処理
        return view('tasks.edit');
    }

    public function TaskEdit(Request $request) { //M18 課題編集処理
        return redirect('/tasks');
    }

    public function destroy(Request $request) {
        return redirect('/tasks');
    }
} 


