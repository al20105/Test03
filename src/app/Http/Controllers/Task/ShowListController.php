<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : ShowListController.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Purpose             : カレンダー・ToDoリスト画面表示を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.28
*/

use App\Models\User;
use App\Models\Task;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Providers\RouteServiceProvider;

class ShowListController extends Controller
{
    // 継承
    use GetUser; 
    use TagController; 
    use RedirectsUsers;

/****************************************************************************
*** Function Name       : ShowListWD( Request $request )
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Function            : 課題情報の一覧表示を行う
*** Return              : 画面表示
****************************************************************************/

    public function ShowListWD( Request $request ) // HTTPリクエスト
    {
        $tag_input = $request->input('tag'); // タグの入力
        $tag = Tag::where('name',$tag_input)->first(); // タグ情報
        if ($tag != null)
        { 
            $tasks = $tag->tasks; // 課題情報の配列
            $tasks = $tasks->where('user_id', $this->user->id);
        }
        else
        {
            $tasks = $this->user->tasks; // 課題情報の配列
        }
        $tags = $this->GetTags($this->user->tasks); // タグ情報の配列
        return view('tasks.index',compact('tasks','tags'));
    }

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : TagEditIndex( Request $request )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : タグ編集画面表示を行う
*** Return              : リダイレクト
****************************************************************************/
    public function TagEditIndex( Request $request ) // HTTPリクエスト
    {
        $tasks = null; // 課題情報の配列
        if ($request->has('approve'))
        {
            if ($request->name!="")
            {
                $tag = Tag::where('name',$request->old)->first(); // タグ情報 
                $tasks = $this->TagEdit($this->user->id,$tag->id,$request->name);
            }
        }

        if ($tasks!=null)
        {
            $messageKey = 'successMessage'; // 成功メッセージ
            $flashMessage = __('flash.tag_edit_success'); // フラッシュメッセージ
        }
        else
        {
            $messageKey = 'errorMessage'; // 失敗メッセージ
            $flashMessage = __('flash.tag_edit_failed'); // フラッシュメッセージ
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

    
/****************************************************************************
*** Function Name       : TagDeleteIndex( Request $request )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : タグ削除画面表示を行う
*** Return              : リダイレクト
****************************************************************************/

    public function TagDeleteIndex( Request $request ) // HTTPリクエスト
    {
        $task = null; // 課題情報
        if ($request->has('approve'))
        { 
            $tag = Tag::where('name',$request->name)->first(); // タグ情報
            $task = $this->TagDelete($this->user->id,$tag->id);
        }

        if ($task)
        {
            $messageKey = 'successMessage'; // 成功メッセージ
            $flashMessage = __('flash.tag_delete_success'); // フラッシュメッセージ
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }
}
