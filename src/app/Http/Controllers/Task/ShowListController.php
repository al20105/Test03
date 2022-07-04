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

    public function ShowListWD(Request $request) { //M3 一覧表示UI処理
        $tag_input = $request->input('tag'); // クエリパラメータのタグの入力を代入
        $tag = Tag::where('name',$tag_input)->first();
        if ($tag != null) { 
            $tasks = $tag->tasks; // そのタグを持つすべての課題を絞り込む
            $tasks = $tasks->where('user_id', $this->user->id); // 学生が持つ課題を取得
        } else {
            $tasks = $this->user->tasks; // 学生が持つ課題を取得
        }
        
        $tags = $this->GetTags($this->user->tasks);
        return view('tasks.index',compact('tasks','tags'));
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function TagEditIndex(Request $request) {
        if ($request->has('approve')) {
            if ($request->name!=""){
                $tag = Tag::where('name',$request->old)->first();
                $task = $this->TagEdit($this->user->id,$tag->id,$request->name);
            }
        }

        if ($task) {
            $messageKey = 'successMessage';
            $flashMessage = __('flash.tag_edit_success');
        } else {
            $messageKey = 'errorMessage';
            $flashMessage = __('flash.tag_edit_failed');
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }

    public function TagDeleteIndex(Request $request) {
        if ($request->has('approve')) {
            $tag = Tag::where('name',$request->name)->first();
            $task = $this->TagDelete($this->user->id,$tag->id);
        }

        if ($task) {
            $messageKey = 'successMessage';
            $flashMessage = __('flash.tag_delete_success');
        }
        return redirect($this->redirectPath())->with($messageKey, $flashMessage);
    }
}