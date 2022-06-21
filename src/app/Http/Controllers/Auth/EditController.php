<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    }
}
