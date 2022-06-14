<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    use GetUser;

    public function ShowTaskEditWD() { //M6 課題編集画面表示UI処理
        return view('tasks.edit');
    }

    protected function TaskEdit(Request $request) { //M18 課題編集処理
        $this->TaskCheck($request->all())->validate();
        $this->user->task()->create($request->all());

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }

    protected function edit(array $data)
    {
        return Task::edit([
            'task_user' => $data['task_user'],
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'tag' => $data['tag'],
            'memo' => $data['memo'],
        ]);
    }
}
