<?php
/*******************************************************************
***  File Name		: TaskCheck.php
***  Version		: V1.0
***  Designer		: 秋葉 星輝
***  Date			: 2022.06.13
***  Purpose       	: 課題のバリデーション処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.13 作成
*/

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

// 課題のバリデート処理(継承用)
trait TaskCheck
{
    public function TaskCheck(array $data) // 課題のバリデーション処理
    {
        return Validator::make($data, [
            'name' => ['required', 'max:100', 'regex:/^(?!.*(<|>)).*$/'], // 課題名をnullでない、100文字以下、<と>が含まれていない(エラー回避)かチェック
            'date' => ['required', 'max:10'], // 締め切り時間がnullでない、10文字以下(エラー回避)かチェック
            'memo' => ['regex:/^(?!.*(<|>)).*$/'] // 詳細情報に<>が含まれていない(エラー回避)
        ]);
    }
}