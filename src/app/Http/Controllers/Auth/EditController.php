<?php
/*******************************************************************
***  File Name		: EditController.php
***  Version		: V2.0
***  Designer		: 佐藤　駿介
***  Date			: 2022.06.25
***  Purpose       	: アカウント情報を編集する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤　駿介, 2022.06.18
*** V2.0 : 佐藤　駿介, 2022.06.25 アカウント編集処理

*/

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

<<<<<<< HEAD
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
=======
    public function userEdit(Request $request) 
    {

        $auth = User::find(1);
        //バリデーション処理
        $this->auth_validate($request->all())->validate();
        //データの上書き編集
        $this->update($request->all(),$auth);
        return redirect('home');
    }

    public function update(array $data, //入力データ
                            User $user )//ユーザデータ
    {
        //データの上書き編集
        return $user->update([
            'name' => $data['name'],//ユーザ名
            'email' => $data['email']//メールアドレス
        ]);
    }
    
    protected function auth_validate(array $data)
    {
        //バリデーション処理
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],//ユーザ名
            'email' => ['required', 'string', 'email', 'max:255'],//メールアドレス
            'password' => ['required', 'string', 'min:8','current_password']//現在のパスワード
>>>>>>> origin/main
        ]);
    }

}
