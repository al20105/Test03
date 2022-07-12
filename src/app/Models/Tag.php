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
    use HasFactory;

    protected $fillable = ['name'];

    // 課題の取得
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
