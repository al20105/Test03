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

    public function ShowTaskEditWD() {
        return view('tasks.edit');
    }

    protected $redirectTo = '/tasks';

    protected function TaskEdit(Request $request)
    {
        $this->TaskCheck($request->all())->validate();
        $this->user->tasks()->update($request->all());

        return $request->wantsJson() ? new JsonResponse([], 201) : redirect($this->redirectPath());
    }

    protected function update(array $data)
    {
        return Task::where('id', '=', $data['id'])->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
    }
}
