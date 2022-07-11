<?php

namespace App\Http\Controllers\Task;

use App\Models\Tag;
use Illuminate\Support\Collection;

trait TagController
{
    public function TagCreate(String $name) // タグ生成
    {
        $tag = new Tag; // 新しいTagを生成
        $tag->name = $name; // 入力された名前を代入
        $tag->save(); // 保存
        return $tag; // 生成したタグを返す
    }

    public function TagRegister($data) // タグ登録
    {
        $tags = null; // 空の変数を宣言
        if ($data!=null) // 入力データがnullでない
        {
            $tag_names = array_unique($data); // 入力データを配列で取得
            foreach ($tag_names as $name) // 配列をループ
            { 
                if ($name!=null && !preg_match('/#/',$name)) // nullでないかつ#が含まれていない
                {
                    $tag = Tag::where('name',$name)->first(); // その名前を持つタグを検索
                    if ($tag != null) // すでに存在する場合
                    {
                        $tags[] = $tag->id; // 既存のタグのidを格納
                    }
                    else
                    {
                        $tags[] = $this->TagCreate($name)->id; // 新規にタグを生成し、そのidを格納
                    }
                }
            }
        }
        return $tags; // タグidの配列またはnullを返す
    }

    public function GetTags(Collection $tasks) // 課題からタグを取得する
    {
        $tags = new Collection(); // 空のCollection(Eloquementの配列)を宣言
        foreach($tasks as $task) // 入力された課題群をループ
        {
            foreach($task->tags as $tag) // 課題が持つタグをループ
            {
                $tags->add($tag); // Collectionに格納
            }
        }
        return $tags->unique('id'); // 重複なしのタグのCollectionを返す
    }

    public function TagEdit($user_id, $tag_id, String $name) // タグ編集
    {
        $tasks = null; // 空の変数を宣言
        $id = $this->TagRegister([$name]); // 入力された名前から既存のタグのidを取得、もしくは新規作成したidを代入
        if ($id != null) // idが存在する($nameがnullでなく、#が含まれていない)
        {
            $tasks = $this->TagDelete($user_id, $tag_id); // 元のタグ削除処理
            $tag = Tag::find($id)->first(); // 変更後のタグを取得
            foreach($tasks as $task) // 変更される課題をループ
            {
                $task->tags()->attach($tag); // タグを新規に紐づけ
                $task->tags()->sync($task->tags->unique('id')); // 重複を除去
            }
        }
        return $tasks; // 変更された課題群またはnullを返す
    }

    public function TagDelete($user_id, $tag_id) // タグ削除処理
    {
        $tag = Tag::find($tag_id); // 入力されたidからタグを取得
        $tasks = $tag->tasks; // そのタグを持つ課題群を取得
        $tasks = $tasks->where('user_id',$user_id); // 入力されたユーザーで絞り込み
        foreach($tasks as $task) // 課題群をループ
        {
            $task->tags()->detach($tag); // タグの紐づけ解除
        }
        return $tasks; // 変更された課題群を返す
    }
}