<?php

/*******************************************************************
*** File Name           : Task.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Purpose             : 課題の構造体を定義する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.14
*/

namespace App\Models;          

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model      
{ 
    use HasFactory; // 継承
    
    protected $fillable = // 代入を許可する変数
    [
        'user_id',
        'name',
        'date',
        'time',
        'memo'
    ];

/****************************************************************************
*** Function Name       : user()
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Function            : アカウント情報を取得する
*** Return              : 課題情報の所有者であるアカウント情報
****************************************************************************/

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

/****************************************************************************
*** Function Name       : tags()
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Function            : タグ情報を取得する
*** Return              : 課題情報が持っているタグ情報
****************************************************************************/
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
