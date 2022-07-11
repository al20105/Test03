<?php

namespace App\Http\Controllers\Task;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait TaskCheck
{
    public function TaskCheck(array $data) // 課題のバリデーション処理
    {
        return Validator::make($data, [
            'name' => ['required', 'max:100', 'regex:/^(?!.*(<|>)).*$/'], // 課題名をnullでない、100文字以下、<と>が含まれていない(エラー回避)かチェック
            'date' => ['required', 'max:10'], // 締め切り時間がnullでない、10文字以下(エラー回避)かチェック
        ]);
    }
}