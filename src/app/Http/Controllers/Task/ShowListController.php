<?php

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
    use GetUser; use TagController; use RedirectsUsers;

    public function ShowListWD(Request $request)
    { //M3 一覧表示UI処理
        $tag_input = $request->input('tag'); // クエリパラメータのタグの入力を代入
        $tag = Tag::where('name',$tag_input)->first(); // タグを取得
        if ($tag != null) // タグが存在する場合
        { 
            $tasks = $tag->tasks; // そのタグを持つすべての課題を絞り込む
            $tasks = $tasks->where('user_id', $this->user->id); // 学生が持つ課題を取得
        }
        else
        {
            $tasks = $this->user->tasks; // 学生が持つすべての課題を取得
        }
        $tags = $this->GetTags($this->user->tasks); // 課題がもつタグのリストを取得
        return view('tasks.index',compact('tasks','tags')); // $tasks, $tagsを入力してsrc/resources/views/tasks/index.blade.phpを表示
    }

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパスにhomeを指定

    public function TagEditIndex(Request $request) // タグ編集処理
    {
        $tasks = null; // 空の変数を宣言
        if ($request->has('approve')) // 編集ボタンが押された場合
        {
            if ($request->name!="") // nullでない場合
            {
                $tag = Tag::where('name',$request->old)->first(); // 変更するタグを取得 
                $tasks = $this->TagEdit($this->user->id,$tag->id,$request->name); // 編集処理
            }
        }

        if ($tasks!=null) // $tasksに値がある場合
        {
            $messageKey = 'successMessage'; // 成功
            $flashMessage = __('flash.tag_edit_success'); // フラッシュメッセージを生成
        }
        else
        {
            $messageKey = 'errorMessage'; // 失敗
            $flashMessage = __('flash.tag_edit_failed'); // フラッシュメッセージを生成
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage); // リダイレクトパスにリダイレクト
    }

    public function TagDeleteIndex(Request $request) // タグ削除処理
    {
        $task = null; // 空の変数を宣言
        if ($request->has('approve')) // 削除ボタンが押された場合
        { 
            $tag = Tag::where('name',$request->name)->first(); // 入力されたタグを取得
            $task = $this->TagDelete($this->user->id,$tag->id); // 削除処理
        }

        if ($task) // $taskに値がある場合
        {
            $messageKey = 'successMessage'; // 成功
            $flashMessage = __('flash.tag_delete_success'); // フラッシュメッセージを生成
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage); //リダイレクトパスにリダイレクト
    }
}