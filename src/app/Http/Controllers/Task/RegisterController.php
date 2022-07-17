<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : RegisterController.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : 課題情報登録を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    // 継承
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;
    use TagController;

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : TaskRegister( Request $request )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : 課題情報の登録を行う
*** Return              : リダイレクト
****************************************************************************/

    protected function TaskRegister( Request $request ) // HTTPリクエスト
    {
        $task = null; // 課題情報
        if ($request->has('approve'))
        {
            $this->TaskCheck($request->all())->validate();
            $task = $this->user->tasks()->Create($request->all());
            $tags = $this->TagRegister($request->input('tags')); // タグ情報
            $task->tags()->attach($tags);
        }

        if ($task != null)
        {
            $messageKey = 'successMessage'; // 成功メッセージ
            if (is_array($request->input('tags')) && preg_match('/[#<>]/',implode($request->input('tags'))))
            {
                $flashMessage = __('flash.task_register_success_without_mark');// フラッシュメッセージ
            }
            else
            {
                $flashMessage = __('flash.task_register_success');// フラッシュメッセージ
            }
        }
        else
        {
            $messageKey = 'errorMessage'; // 失敗メッセージ
            $flashMessage = __('flash.task_register_failed');// フラッシュメッセージ
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

/****************************************************************************
*** Function Name       : Create( array $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : 課題情報の生成を行う
*** Return              : 課題情報
****************************************************************************/

    protected function Create( array $data ) // 入力データ
    {
        return Task::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
    }
}
