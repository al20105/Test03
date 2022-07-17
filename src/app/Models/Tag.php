<?php

/*******************************************************************
*** File Name           : Tag.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : タグ情報を定義する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory; // 継承

    protected $fillable = ['name']; // 入力可能な変数

/****************************************************************************
*** Function Name       : tasks()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : タグ情報を持っている課題情報を取得する
*** Return              : タグ情報を持っている課題情報
****************************************************************************/

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
