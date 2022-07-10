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
    use GetUser; use TaskCheck; use RedirectsUsers; use TagController;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function TaskRegister(Request $request)
    {
        if ($request->has('approve')) {
            $this->TaskCheck($request->all())->validate();
            $task = $this->user->tasks()->create($request->all());
            $tags = $this->TagRegister($request->input('tags'));

            $task->tags()->attach($tags);
        }

        if ($task) {
            $messageKey = 'successMessage';
            if (is_array($request->input('tags')) && preg_match('/#/',implode($request->input('tags')))) {
                $flashMessage = __('flash.task_register_success_without_hashmark');
            }
            else {
                $flashMessage = __('flash.task_register_success');
            }
        } else {
            $messageKey = 'errorMessage';
            $flashMessage = __('flash.task_register_failed');
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

    protected function create(array $data)
    {
        return Task::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
    }
}
