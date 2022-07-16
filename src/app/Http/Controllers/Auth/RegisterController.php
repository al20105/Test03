<?php
/*******************************************************************
*** File Name           : ResisterController.php
*** Version             : V1.0
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.18
*** Purpose             : アカウント情報を登録する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤 駿介, 2022.06.18

*/
namespace App\Http\Controllers\Auth;

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
*** Date                : 2022.06.18
*** Function            : 新しいコントローラーのインスタンスを生成する
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

    protected function validator(array $data) // 入力データ
    {
        return Validator::make($data,
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

/****************************************************************************
*** Function Name       : create( array $data )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : アカウント情報の登録を行う
*** Return              : アカウント情報
****************************************************************************/

    protected function create( array $data ) // 入力データ
    {
        return User::create(
        [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
