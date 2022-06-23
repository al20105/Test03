<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            // 認証情報を取得
            $this->user = Auth::user();
            View::share('user', $this->user);
            return $next($request);
        });
    }

    public function index() {
        $tasks = $this->user->tasks;
        return view('tasks.index',compact('tasks'));
    }
}
