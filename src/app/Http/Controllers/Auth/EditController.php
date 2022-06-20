<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{

    protected $redirectTo = '/edit';


    public function ShowEditForm() {
        return view('auth.edit');
    }

    public function userEdit(Request $request) {
        //var_dump($request);
        //$auth = Auth::user();
        $auth = User::find(1);
        //$this->auth_validate($request->all())->validate(); 
        $this->update($request->all(),$auth);  
        //$auth->save($request->all());//追加
        return view('auth.edit',[ 'auth' =>  $auth]);
        
    }

    public function update(array $data, User $user){
       
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }
    
    protected function auth_validate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255']
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
/*
    //userデータの取得
    public function index() {
        return view('user.index', ['user' => Auth::user() ]);
    }

    //userデータの編集
    public function edit() {
        return view('auth.edit', ['user' => Auth::user() ]);
    }


    public function update(Request $request) {

        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/index');
    }

*/
}