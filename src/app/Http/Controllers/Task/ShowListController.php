<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Task;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowListController extends Controller
{
    use GetUser; use TagController;

    public function ShowListWD(Request $request) { //M3 一覧表示UI処理
        $tag_input = $request->input('tag'); // クエリパラメータのタグの入力を代入
        if ($tag_input != null) { 
            $tasks = $this->TagFilter($tag_input); // そのタグを持つすべての課題を絞り込む
            $tasks = $tasks->where('user_id', $this->user->id); // 学生が持つ課題を取得
        } else {
            $tasks = $this->user->tasks; // 学生が持つ課題を取得
        }
        
        $tags = $this->GetTags($this->user->tasks);
        return view('tasks.index',compact('tasks','tags'));
    }

    public function TagFilter($name) {
        $tag = Tag::where('name',$name)->first();
        return $tag->tasks;
    }
}