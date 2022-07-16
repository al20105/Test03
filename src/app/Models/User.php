<?php

/*******************************************************************
*** File Name           : User.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Purpose             : ユーザーの構造体を定義する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.14
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

    protected $fillable = // 代入を許可する変数
    [
        'name',
        'email',
        'password',
    ];

    protected $hidden = // 秘匿性の高い変数
    [
        'password',
        'remember_token',
    ];

    protected $casts = // データを自動変換する変数
    [
        'email_verified_at' => 'datetime',
    ];

/****************************************************************************
*** Function Name       : tasks()
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Function            : 課題情報を取得する
*** Return              : アカウント情報が持っている課題情報
****************************************************************************/

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
