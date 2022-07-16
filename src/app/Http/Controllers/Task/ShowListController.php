<?php

/*******************************************************************
*** File Name           : ShowListController.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.13
*** Purpose             : 一覧表示処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.13 作成
*/

namespace App\Http\Controllers\Task;

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
*** Date                : 2022.06.13
*** Function            : 課題情報の一覧表示処理を行う
*** Return              : 画面表示
****************************************************************************/

    public function ShowListWD( Request $request ) // HTTPリクエスト
    {
        $tag_input = $request->input('tag'); // クエリパラメータのタグ情報の入力
        $tag = Tag::where('name',$tag_input)->first(); // タグ情報
        if ($tag != null)
        { 
            $tasks = $tag->tasks; // 取得したタグ情報を持つ課題情報の配列
            $tasks = $tasks->where('user_id', $this->user->id);
        }
        else
        {
            $tasks = $this->user->tasks; // 学生が持つ課題情報の配列
        }
        $tags = $this->GetTags($this->user->tasks); // 課題情報がもつタグ情報の配列
        return view('tasks.index',compact('tasks','tags'));
    }

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパスにhomeを指定

/****************************************************************************
*** Function Name       : TagEditIndex( Request $request )
*** Designer            : 平佐 竜也
*** Date                : 2022.06.30
*** Function            : 課題情報のタグの編集処理を行う
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
*** Designer            : 平佐 竜也
*** Date                : 2022.06.30
*** Function            : 課題情報のタグの削除処理を行う。
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
