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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class EditController extends Controller
{
    public function ShowEditForm(Request $request) 
    {
        return view('auth.edit', [
            'change_id' => $request->id
        ]);
    }
/****************************************************************************
*** Function Name       : userEdit(Request $request)
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : アカウント編集処理。
*** Return              : リダイレクト
****************************************************************************/
    public function userEdit(Request $request) 
    {
        $auth = User::find($request->id);
        //バリデーション処理
        $this->auth_validate($request->all())->validate();
        //データの上書き編集
        $this->update($request->all(),$auth);
        return redirect('home');
    }
/****************************************************************************
*** Function Name       : update(array $data, User $user)
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : 情報更新処理。
*** Return              : 更新情報
****************************************************************************/
    public function update(array $data, //入力データ
                            User $user )//ユーザデータ
    {
        //データの上書き編集
        return $user->update([
            'name' => $data['name'],//ユーザ名
            'email' => $data['email']//メールアドレス
        ]);
    }
    /****************************************************************************
*** Function Name       : auth_validate(array $data)
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : バリデーション処理。
*** Return              : バリデーション結果
****************************************************************************/
    protected function auth_validate(array $data)
    {
        //バリデーション処理
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],//ユーザ名
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],//メールアドレス
            'password' => ['required', 'string', 'min:8','current_password']//現在のパスワード
        ]);
    }
}