<?php

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

trait GetUser
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware(function ($request, $next)
        {
            $this->user = Auth::user(); // 認証情報を取得
            View::share('user', $this->user);
            return $next($request);
        });
    }
}
