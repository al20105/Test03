<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function index(){
        return view('user.index', ['user' => Auth::user()]);
    }

    public function edit(){
        return view('user.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request){
        $STUDENT = $request ->all();
        $user = Auth::user();
        unset($STUDENT['_token']);
        $user->fill($STUDENT)->save();
        return redirect('user/index');
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

    public function userEdit(Request $request) {

        $auth = User::find(1);
        $this->auth_validate($request->all())->validate();
        //$comfirm_pass = $request['password'];
        /*if(Hash::check($comfirm_pass,$auth->password)){
            $this->update($request->all(),$auth);
        }else{
        }
        */
        $this->update($request->all(),$auth);
        return redirect('home');
>>>>>>> origin/main
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
            'email' => ['required', 'string', 'email', 'max:255'],
            //'password' => ['required', 'string', 'min:8']
        ]);
    }

}