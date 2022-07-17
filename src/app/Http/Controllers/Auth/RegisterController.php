<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : RegisterController.php
*** Version             : V1.0
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Purpose             : アカウント情報登録を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤 駿介, 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : コントローラーのインスタンス生成を行う
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('guest');
    }

/****************************************************************************
*** Function Name       : validator( array $data )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : バリデーション処理を行う
*** Return              : バリデーション結果
****************************************************************************/
    protected function validator( array $data ) // 入力データのバリデーション処理
    {
        return Validator::make($data, 
        [
            'name' => ['required', 'string', 'max:255'], // ユーザー名
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // メール
            'password' => ['required', 'string', 'min:8', 'confirmed'], // パスワード
        ]);
    }

/****************************************************************************
*** Function Name       : create( array $data )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : アカウント情報の生成を行う
*** Return              : アカウント情報
****************************************************************************/

    protected function create( array $data ) // 入力データ
    {
        return User::create(
        [
            'name' => $data['name'], // ユーザー名
            'email' => $data['email'], // メール
            'password' => Hash::make($data['password']), // パスワードのhash
        ]);
    }
}
