<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


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

    public function TaskRegisterCheck() { //M16 課題内容不備確認 登録，編集で使う バリデーション処理
        return true;
    }

    public function TaskRegister(Request $request) { //M17 課題登録処理
        return redirect('/tasks');
    }

    public function ShowTaskEditWD() { //M6 課題編集画面表示UI処理
        return view('tasks.edit');
    }



    public function TaskEdit(Request $request) { //M18 課題編集処理
        $TASK = [
            'task_user' => $request->task_user,
            'task_name' => $request->task_name,
            'date' => $request->date,
            'time' => $request->time,
            'tag' => $request->tag,
            'memo' => $request->memo,
        ];

        $post = new Post;
        $post->fill($TASK)->save();

        return redirect('/tasks');
    }



    public function destroy(Request $request) {
        return redirect('/tasks');
    }
} 
