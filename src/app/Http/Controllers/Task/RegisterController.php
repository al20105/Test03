<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    use GetUser; use TaskCheck; use RedirectsUsers;

    public function ShowTaskRegisterWD() { //M5 課題登録画面表示UI処理
        return view('tasks.create');
    }

    protected $redirectTo = '/tasks';

    protected function TaskRegister(Request $request)
    {
        $this->TaskCheck($request->all())->validate();
        $this->user->tasks()->create($request->all());

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        return Task::create([
            'task_user' => $this->user->id,
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
    }
}
