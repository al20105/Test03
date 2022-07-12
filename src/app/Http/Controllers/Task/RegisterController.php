<?php
/*******************************************************************
***  File Name		: RegisterController.php
***  Version		: V1.0
***  Designer		: 秋葉 星輝
***  Date			: 2022.06.13
***  Purpose       	: 課題の登録
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.13 作成
*/

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    use GetUser; use TaskCheck; use RedirectsUsers; use TagController;

    protected $redirectTo = RouteServiceProvider::HOME;

    // 課題登録処理
    protected function TaskRegister(Request $request)
    {
        $task = null; //空の変数を宣言
        if ($request->has('approve')) // 登録ボタンが押された場合
        {
            $this->TaskCheck($request->all())->validate(); // 入力データのバリデーション処理
            $task = $this->user->tasks()->Create($request->all()); // 登録処理(下記の関数)
            $tags = $this->TagRegister($request->input('tags')); // タグの登録処理
            $task->tags()->attach($tags); // 課題とタグの紐づけ
        }

        if ($task != null)
        {
            $messageKey = 'successMessage'; // 成功
            if (is_array($request->input('tags')) && preg_match('/[#<>]/',implode($request->input('tags')))) // タグに#が含まれている場合
            {
                $flashMessage = __('flash.task_register_success_without_mark');// フラッシュメッセージを生成
            }
            else
            {
                $flashMessage = __('flash.task_register_success');// フラッシュメッセージを生成
            }
        }
        else
        {
            $messageKey = 'errorMessage'; // 失敗
            $flashMessage = __('flash.task_register_failed');// フラッシュメッセージを生成
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage); // リダイレクトパスにリダイレクト
    }

    protected function Create(array $data)
    {
        return Task::create([ // 課題の登録処理
            'name' => $data['name'], // 課題名
            'date' => $data['date'], // 締め切り日
            'time' => $data['time'], // 締め切り時間
            'memo' => $data['memo'] // 詳細情報
        ]);
    }
}
