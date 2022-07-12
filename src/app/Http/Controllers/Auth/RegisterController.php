<?php
/*******************************************************************
***  File Name		: ResisterController.php
***  Version		: V1.0
***  Designer		: 佐藤　駿介
***  Date			: 2022.06.18
***  Purpose       	: アカウント情報を登録する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤　駿介, 2022.06.18

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /****************************************************************************
*** Function Name       : validator( array $data )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : バリデーション処理を行う。
*** Return              : バリデーション結果
****************************************************************************/
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],//ユーザ名
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],//メールアドレス
            'password' => ['required', 'string', 'min:8', 'confirmed'],//パスワード
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    /****************************************************************************
*** Function Name       : create(array $data)
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : ユーザ情報の構造を作成。
*** Return              : 構造体
****************************************************************************/
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],//ユーザ名
            'email' => $data['email'],//メールアドレス
            'password' => Hash::make($data['password']),//パスワード
        ]);
    }
}
