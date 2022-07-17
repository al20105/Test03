<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : TaskCheck.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : 課題情報のバリデーション処理を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{

/****************************************************************************
*** Function Name       : TaskCheck( array $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : 課題情報のバリデーション処理を行う
*** Return              : バリデーション結果
****************************************************************************/
    public function TaskCheck( array $data ) // 入力データ
    {
        return Validator::make($data,
        [
            'name' => ['required', 'max:100', 'regex:/^(?!.*(<|>)).*$/'],
            'date' => ['required', 'max:10'],
            'memo' => ['nullable', 'max:256', 'regex:/^(?!.*(<|>)).*$/']
        ]);
    }
}