<?php

/*******************************************************************
*** File Name           : User.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : アカウント情報を定義する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // 継承
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = // 入力可能な変数
    [
        'name',
        'email',
        'password',
    ];

    protected $hidden = // 秘匿される変数
    [
        'password',
        'remember_token',
    ];

    protected $casts = // 自動で入力される変数
    [
        'email_verified_at' => 'datetime',
    ];

/****************************************************************************
*** Function Name       : tasks()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : アカウント情報が持っている課題情報を取得する
*** Return              : アカウント情報が持っている課題情報
****************************************************************************/

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
