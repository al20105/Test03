<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : TagController.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : タグ情報の登録、検索、
***                       編集、削除を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.06.28
*/

use App\Models\Tag;
use Illuminate\Support\Collection;

trait TagController
{

/****************************************************************************
*** Function Name       : TagCreate( String $name )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : タグ情報の生成を行う
*** Return              : タグ情報
****************************************************************************/

    public function TagCreate( String $name ) // 入力データ
    {
        $tag = new Tag; // タグ情報
        $tag->name = $name;
        $tag->save();
        return $tag;
    }

/****************************************************************************
*** Function Name       : TagRegister( $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : タグ情報の登録を行う
*** Return              : タグ情報の配列
****************************************************************************/

    public function TagRegister( $data ) // 入力データ
    {
        $tags = null; // タグ情報の配列
        if ($data != null)
        {
            $tag_names = array_unique($data); // 入力データの配列
            foreach ($tag_names as $name)
            { 
                if ($name!=null && !preg_match('/[#<>]/',$name))
                {
                    if (strlen($name)>99)
                    {
                        $name = mb_substr($name, 0, 99, "utf-8");
                    }
                    $tag = Tag::where('name',$name)->first(); // タグ情報
                    if ($tag != null)
                    {
                        $tags[] = $tag->id;
                    }
                    else
                    {
                        $tags[] = $this->TagCreate($name)->id;
                    }
                }
            }
        }
        return $tags;
    }

/****************************************************************************
*** Function Name       : GetTags( Collection $tasks )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : タグ情報を取得する
*** Return              : タグ情報の配列
****************************************************************************/

    public function GetTags( Collection $tasks ) // 課題情報の配列
    {
        $tags = new Collection(); // タグ情報の配列
        foreach($tasks as $task)
        {
            foreach($task->tags as $tag)
            {
                $tags->add($tag);
            }
        }
        return $tags->unique('id');
    }
    
/****************************************************************************
*** Function Name       : TagEdit( $user_id, $tag_id, String $name )
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : タグ情報の編集を行う
*** Return              : 課題情報の配列
****************************************************************************/

    public function TagEdit( $user_id, // アカウントID
                             $tag_id, // タグID
                             String $name) // 入力データ
    {
        $tasks = null; // 課題情報の配列
        $id = $this->TagRegister([$name]); // タグID
        if ($id != null)
        {
            $tasks = $this->TagDelete($user_id, $tag_id);
            $tag = Tag::find($id)->first(); // タグ情報
            foreach($tasks as $task)
            {
                $task->tags()->attach($tag);
                $task->tags()->sync($task->tags->unique('id'));
            }
        }
        return $tasks;
    }

/****************************************************************************
*** Function Name       : TagDelete( $user_id, $tag_id )
*** Designer            : 長尾 理生
*** Date                : 2022.06.28
*** Function            : タグ情報の削除を行う
*** Return              : なし
****************************************************************************/

    public function TagDelete($user_id, // アカウントID
                              $tag_id) // タグID
    {
        $tag = Tag::find($tag_id); // タグ情報
        $tasks = $tag->tasks; // 課題情報の配列
        $tasks = $tasks->where('user_id',$user_id);
        foreach($tasks as $task)
        {
            $task->tags()->detach($tag);
        }
        return $tasks;
    }
}
