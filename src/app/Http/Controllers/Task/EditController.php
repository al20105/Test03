<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class EditController extends Controller
{
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;

    public function ShowTaskEditWD($encrypted) {
        $data = Task::find(Crypt::decrypt($encrypted));
        return view('tasks.edit', ['task' => $data]);
    }

    protected function TaskEdit(Request $request)
    {
        /*echo "<pre>";
        var_dump(        $request->all()    );
        echo "</pre>";*/
        $data = Task::find($request->id);
        echo "<pre>";        var_dump($data);        echo "</pre>";
        $data->fill($request->all())->save();
//      $data->validate();

/*        Task::find($request->id)->update([
            'name' => (bigint_unsigned)$request->name,
            'date' => (date)$request->date,
            'time' => (time)$request->time,
            'memo' => (text)$request->memo
        ]);
*/

        //return redirect('/tasks');
    }
}
