<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;

class EditController extends Controller
{
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;

    public function ShowTaskEditWD($encrypted) {
        $task = Task::find(Crypt::decrypt($encrypted))->first();
        return view('tasks.edit', compact('task'));
    }

    protected $redirectTo = '/tasks';

    protected function TaskEdit(Request $request)
    {
        $this->TaskCheck($request->all())->validate();
        $this->update($request->all());

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }

    protected function update(array $data)
    {
        Task::find($data['id'])->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
    }
}