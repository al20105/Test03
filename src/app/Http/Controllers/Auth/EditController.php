<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        //var_dump($request);
        //$auth = Auth::user();
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