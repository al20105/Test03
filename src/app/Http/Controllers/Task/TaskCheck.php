<?php
/*******************************************************************
*** File Name           : TaskCheck.php
*** Version	            : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.13
*** Purpose             : 課題のバリデーション処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.13 作成
*/

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{

/****************************************************************************
*** Function Name       : TaskCheck( array $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.13
*** Function            : 課題情報のバリデーション処理を行う
*** Return              : 失敗した場合バリデーションメッセージ
****************************************************************************/

    public function TaskCheck( array $data ) // 課題情報
    {
        return Validator::make($data,
        [
            'name' => ['required', 'max:100', 'regex:/^(?!.*(<|>)).*$/'],
            'date' => ['required', 'max:10'],
            'memo' => ['nullable', 'max:256', 'regex:/^(?!.*(<|>)).*$/']
        ]);
    }
}
