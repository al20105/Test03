<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : TagController.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.07.04
*** Purpose             : タグ情報の登録、検索、
***                       編集、削除を行う。
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.07.04
*/

use App\Models\Tag;
use Illuminate\Support\Collection;

// タグの処理(継承用)
trait TagController
{

/****************************************************************************
*** Function Name       : TagCreate( String $name )
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Function            : タグ情報を生成する。
*** Return              : タグ情報
****************************************************************************/

    // タグ生成処理
    public function TagCreate(String $name)
    {
        $tag = new Tag; // 新しいTagを生成
        $tag->name = $name; // 入力された名前を代入
        $tag->save(); // 保存
        return $tag; // 生成したタグを返す
    }

/****************************************************************************
*** Function Name       : TagRegister( $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Function            : タグ情報の登録処理を行う。
*** Return              : タグ情報の配列
****************************************************************************/

    // タグ登録処理
    public function TagRegister($data)
    {
        $tags = null; // 空の変数を宣言
        if ($data!=null) // 入力データがnullでない
        {
            $tag_names = array_unique($data); // 入力データを配列で取得
            foreach ($tag_names as $name) // 配列をループ
            { 
                if ($name!=null && !preg_match('/[#<>]/',$name)) // nullでないかつ#が含まれていない
                {
                    if (strlen($name)>100) // 101文字以上の場合100文字にする
                    {
                        $name = mb_substr($name, 0, 100, "utf-8");
                    }
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

/****************************************************************************
*** Function Name       : GetTags( Collection $tasks )
*** Designer            : 佐藤 駿介
*** Date                : 2022.07.04
*** Function            : タグ情報を取得する。
*** Return              : タグ情報の配列
****************************************************************************/

    // 課題からタグを取得する
    public function GetTags(Collection $tasks)
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
    
/****************************************************************************
*** Function Name       : TagEdit( $user_id, $tag_id, String $name )
*** Designer            : 里田 侑声
*** Date                : 2022.07.04
*** Function            : タグ情報の編集処理を行う。
*** Return              : 課題情報
****************************************************************************/

     // タグ編集処理
    public function TagEdit($user_id, $tag_id, String $name)
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

/****************************************************************************
*** Function Name       : TagDelete( $user_id, $tag_id )
*** Designer            : 長尾 理生
*** Date                : 2022.07.04
*** Function            : タグ情報の削除処理を行う。
*** Return              : なし
****************************************************************************/

    // タグ削除処理
    public function TagDelete($user_id, $tag_id)
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