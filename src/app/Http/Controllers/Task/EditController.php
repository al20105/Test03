<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;

class EditController extends Controller
{
    use GetUser; use TaskCheck; use RedirectsUsers; use TagController;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function TaskEdit(Request $request)
    {
        if ($request->has('approve')) {
            $this->TaskCheck($request->all())->validate();
            $task = $this->update($request->all());
            $tags = $this->TagRegister($request->input('tags'));

            $task->tags()->sync($tags);
        }

        if ($task->tags) {
            $messageKey = 'successMessage';
            $flashMessage = __('flash.task_edit_success');
        } else {
            $messageKey = 'errorMessage';
            $flashMessage = __('book.task_edit_failed');
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

    protected function update(array $data)
    {
        Task::find($data['id'])->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
        return Task::find($data['id']);
    }
}
