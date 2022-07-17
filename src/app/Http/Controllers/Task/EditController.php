<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : EditController.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : 課題情報編集を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.06.28
*/

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;

class EditController extends Controller
{
    // 継承
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;
    use TagController;

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : TaskEdit( Request $request )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : 課題情報編集画面の表示を行う
*** Return              : リダイレクト
****************************************************************************/

    protected function TaskEdit( Request $request ) // HTTPリクエスト
    {
        $task = null; // 課題情報
        if ($request->has('approve'))
        {
            $this->TaskCheck($request->all())->validate();
            $task = $this->Update($request->all());
            $tags = $this->TagRegister($request->input('tags')); // タグ情報
            $task->tags()->sync($tags);
        }

        if ($task != null) 
        {
            $messageKey = 'successMessage'; // 成功メッセージ
            if (is_array($request->input('tags')) && preg_match('/[#<>]/',implode($request->input('tags'))))
            {
                $flashMessage = __('flash.task_edit_success_without_mark'); // フラッシュメッセージ
            }
            else
            {
                $flashMessage = __('flash.task_edit_success'); // フラッシュメッセージ
            }
        } 
        else 
        {
            $messageKey = 'errorMessage'; // 失敗メッセージ
            $flashMessage = __('flash.task_edit_failed'); // フラッシュメッセージ
        }

        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

/****************************************************************************
*** Function Name       : Update( array $data )
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : 課題情報の編集を行う
*** Return              : 課題情報
****************************************************************************/

    protected function Update( array $data ) // 入力データ
    {
        Task::find($data['id'])->update(
        [
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
        return Task::find($data['id']);
    }
}
