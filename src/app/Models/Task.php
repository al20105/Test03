<?php

/*******************************************************************
*** File Name           : Task.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : 課題情報を定義する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

namespace App\Models;          

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model      
{ 
    use HasFactory; // 継承
    
    protected $fillable = ['user_id', 'name', 'date', 'time', 'memo']; // 入力可能な変数

/****************************************************************************
*** Function Name       : user()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : 課題情報を持っているアカウント情報を取得する
*** Return              : 課題情報を持っているアカウント情報
****************************************************************************/

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

/****************************************************************************
*** Function Name       : tags()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : 課題情報を持っているタグ情報を取得する
*** Return              : 課題情報を持っているタグ情報
****************************************************************************/

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
