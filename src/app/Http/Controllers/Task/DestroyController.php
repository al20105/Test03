<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    use RedirectsUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function destroy($encrypted) {
        $id = Crypt::decrypt($encrypted);
        Task::where('id', $id)->delete();
        
        return redirect($this->redirectPath());
    }
}