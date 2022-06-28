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

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
=======
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    protected $redirectTo = '/home';

    public function ShowEditForm() {
        return view('auth.edit');
    }

    public function userEdit(Request $request) 
    {
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41

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
        ]);
    }

<<<<<<< HEAD
    public function update(Request $request){
        $STUDENT = $request ->all();
        $user = Auth::user();
        unset($STUDENT['_token']);
        $user->fill($STUDENT)->save();
        return redirect('user/index');
    }
=======
>>>>>>> aeab7e180b1f21ba588ceeade8d149a5e75a7e41
}
