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

    protected $redirectTo = RouteServiceProvider::HOME;

/****************************************************************************
*** Function Name       : TaskEdit( Request $request )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : 課題編集画面を表示する。
*** Return              : リダイレクト
****************************************************************************/

    protected function TaskEdit( Request $request ) // リクエスト
    {
        if ($request->has( 'approve' ))
        {
            $this->TaskCheck( $request->all() )->validate();
            $task = $this->update( $request->all() );
            $tags = $this->TagRegister( $request->input( 'tags' ) );

            $task->tags()->sync($tags);
        }

        if ($task->tags)
        {
            $messageKey = 'successMessage';
            $flashMessage = __( 'flash.task_edit_success' );
        }
        else
        {
            $messageKey = 'errorMessage';
            $flashMessage = __( 'book.task_edit_failed' );
        }
        return redirect( $this->redirectPath() )->with( $messageKey, $flashMessage );
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
        Task::find( $data['id'] )->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'time' => $data['time'],
            'memo' => $data['memo']
        ]);
        return Task::find( $data['id'] );
    }
}
