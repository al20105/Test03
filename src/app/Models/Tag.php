<?php

/*******************************************************************
*** File Name           : Tag.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Purpose             : タグの構造体を定義する。
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.07.04
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory; // 継承

    protected $fillable = // 代入を許可する変数
    [
        'name'
    ];

/****************************************************************************
*** Function Name       : tasks()
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Function            : 課題情報を取得する
*** Return              : タグ情報の所有者である課題情報
****************************************************************************/

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
