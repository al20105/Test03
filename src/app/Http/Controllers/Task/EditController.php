<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\RedirectsUsers;

class EditController extends Controller
{
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;

    public function ShowTaskEditWD() { //M6 課題編集画面表示UI処理
        return view('tasks.edit');
    }

    protected $redirectTo = '/tasks';

    protected function TaskEdit(Request $request) { //M18 課題編集処理
        $this->TaskCheck($request->all())->validate();
        $this->user->task()->edit($request->all());

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }

    protected function edit(array $data)
    {
        return Task::edit([
            'task_user' => $this->user->id,
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo'],
        ]);
    }
}
