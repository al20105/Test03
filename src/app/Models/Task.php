<?php

/*******************************************************************
*** File Name           : Task.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.14
*** Purpose             : 課題の構造体を定義する。
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
    use HasFactory;
    
    protected $fillable = ['user_id', 'name', 'date', 'time', 'memo'];

    // 親ユーザーの取得
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // タグの取得
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}  