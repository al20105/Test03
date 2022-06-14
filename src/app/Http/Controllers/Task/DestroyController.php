<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    use GetUser;
    public function destroy(Request $request) {
        return redirect('/tasks');
    }
}