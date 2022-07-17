<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : DeleteController.php
*** Version             : V1.0
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Purpose             : 課題情報削除を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 長尾 理生, 2022.06.28
*/

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    use RedirectsUsers; // 継承
    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : TaskDelete( string $encrypted )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : 課題情報の削除を行う
*** Return              : リダイレクト
****************************************************************************/

    public function TaskDelete( $encrypted ) // 暗号化された課題ID
    { 
        $id = Crypt::decrypt($encrypted); // 復号化された課題ID
        Task::where('id', $id)->delete();

        if (true)
        {
            $messageKey = 'successMessage'; // 成功メッセージ
            $flashMessage = __('flash.task_delete_success'); // フラッシュメッセージ
        }

        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }
}
