<?php

/*******************************************************************
*** File Name           : User.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.14
*** Purpose             : ユーザーの構造体を定義する。
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.14
*** V1.1 : 秋葉 星輝, 2022.07.07 修正
*/

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =
    [
        'name',
        'email',
        'password',
    ];

    protected $hidden =
    [
        'password',
        'remember_token',
    ];

    protected $casts =
    [
        'email_verified_at' => 'datetime',
    ];

/****************************************************************************
*** Function Name       : tasks()
*** Designer            : 
*** Date                : 
*** Function            : 
*** Return              : 
****************************************************************************/

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
