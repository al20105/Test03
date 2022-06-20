<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class EditController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function ShowEditForm() {
        return view('auth.edit');
    }

    public function edit() {
        //
    }
}
