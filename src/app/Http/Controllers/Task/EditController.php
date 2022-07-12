<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : EditController.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : 課題情報の編集を行う。
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
    use GetUser;
    use TaskCheck;
    use RedirectsUsers;
    use TagController;

    protected $redirectTo = RouteServiceProvider::HOME; // homeのurlをリダイレクトパスに設定

/****************************************************************************
*** Function Name       : TaskEdit( Request $request )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : 課題編集画面を表示する。
*** Return              : リダイレクト
****************************************************************************/

    protected function TaskEdit( Request $request ) // リクエスト
    {
        $task = null; // 空の変数を宣言
        if ($request->has('approve')) // 保存ボタンが押されている場合
        {
            $this->TaskCheck($request->all())->validate(); // 入力データをバリデート処理
            $task = $this->update($request->all()); // 上書き処理(下記の関数)
            $tags = $this->TagRegister($request->input('tags')); // タグの登録処理
            $task->tags()->sync($tags); // 課題とタグの同期処理
        }

        if ($task != null) 
        {
            $messageKey = 'successMessage'; // 成功
            if (is_array($request->input('tags')) && preg_match('/[#<>]/',implode($request->input('tags')))) // タグに#が含まれている場合
            {
                $flashMessage = __('flash.task_edit_success_without_mark'); // フラッシュメッセージを生成
            }
            else
            {
                $flashMessage = __('flash.task_edit_success'); // フラッシュメッセージを生成
            }
        } 
        else 
        {
            $messageKey = 'errorMessage'; // 失敗
            $flashMessage = __('flash.task_edit_failed'); // フラッシュメッセージを生成
        }

        return redirect($this->redirectPath())->with($messageKey, $flashMessage); // リダイレクトパスにリダイレクト
    }

/****************************************************************************
*** Function Name       : update( array $data )
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : 課題情報の編集処理を行う。
*** Return              : 課題情報
****************************************************************************/

    protected function update( array $data ) // 
    {
        Task::find($data['id'])->update([ // 上書き処理
            'name' => $data['name'], // 課題名
            'date' => $data['date'], // 締め切り日
            'time' => $data['time'], // 締め切り時間
            'memo' => $data['memo'] // 詳細情報
        ]);
        return Task::find($data['id']); // Taskを返す
    }
}