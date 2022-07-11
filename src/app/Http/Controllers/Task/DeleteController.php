<?php
/*******************************************************************
***  File Name		: DeleteController.php
***  Version		: V1.0
***  Designer		: 長尾 理生
***  Date			: 2022.06.13
***  Purpose       	: 課題を削除する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 長尾 理生, 2022.06.13
*/

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    use RedirectsUsers; // 継承
    protected $redirectTo = RouteServiceProvider::HOME; // homeのURLをリダイレクトパスに設定

    public function TaskDelete($encrypted)
    { 
        $id = Crypt::decrypt($encrypted); // 暗号化された課題idを復号化
        Task::where('id', $id)->delete(); // 削除処理

        if (true)
        {
            $messageKey = 'successMessage';
            $flashMessage = __('flash.task_delete_success'); // フラッシュメッセージを生成
        } 
        return redirect($this->redirectPath())->with($messageKey, $flashMessage); // リダイレクトパスにリダイレクト
    }
}