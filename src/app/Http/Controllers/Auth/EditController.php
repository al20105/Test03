<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : EditController.php
*** Version             : V1.0
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Purpose             : アカウント情報編集を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤 駿介, 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{

/****************************************************************************
*** Function Name       : ShowEditForm( Request $request )
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : アカウント情報編集画面表示を行う
*** Return              : 画面表示
****************************************************************************/

    public function ShowEditForm( Request $request ) // HTTPリクエスト 
    {
        return view('auth.edit',
        [
            'change_id' => $request->id
        ]);
    }

/****************************************************************************
*** Function Name       : userEdit( Request $request )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : アカウント情報の編集を行う
*** Return              : リダイレクト
****************************************************************************/

    public function userEdit( Request $request ) // HTTPリクエスト
    {
        $auth = User::find($request->id); // アカウント情報
        $this->auth_validate($request->all())->validate();
        $this->Update($request->all(),$auth);
        return redirect('home');
    }

/****************************************************************************
*** Function Name       : update( array $data, User $user )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : アカウント情報の更新を行う
*** Return              : アカウント情報
****************************************************************************/

    public function Update(array $data,  // 入力データ
                            User $user ) // アカウント情報
    {
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

/****************************************************************************
*** Function Name       : auth_validate( array $data )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : バリデーション処理を行う
*** Return              : バリデーション結果
****************************************************************************/

    protected function auth_validate( array $data ) // 入力データ
    {
        return Validator::make($data,
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8','current_password']
        ]);
    }
}
