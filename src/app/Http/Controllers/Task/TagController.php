<!--
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
-->

<?php

namespace App\Http\Controllers\Task;

use App\Models\Tag;
use Illuminate\Support\Collection;

trait TagController
{

/****************************************************************************
*** Function Name       : TagCreate( String $name )
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Function            : タグ情報を生成する。
*** Return              : タグ情報
****************************************************************************/

    public function TagCreate( String $name ) // 入力されたタグ名
    {
        $tag = new Tag; // タグ情報
        $tag->name = $name; // タグ名
        $tag->save();
        return $tag;
    }

/****************************************************************************
*** Function Name       : TagRegister( $data )
*** Designer            : 秋葉 星輝
*** Date                : 2022.07.04
*** Function            : タグ情報の登録処理を行う。
*** Return              : タグ情報の配列
****************************************************************************/

    public function TagRegister( $data ) // 
    {
        $tags = null; // タグ情報の配列
        if ($data!=null)
        {
            $tag_names = array_unique($data); // タグ情報
            foreach ($tag_names as $name)
            {
                if ($name != null)
                {
                    $tag = Tag::where( 'name', $name )->first();
                    if ( $tag != null )
                    {
                        $tags[] = $tag->id;
                    }
                    else
                    {
                        $tags[] = $this->TagCreate( $name )->id;
                    }
                }
            }
        }
        return $tags;
    }

/****************************************************************************
*** Function Name       : GetTags( Collection $tasks )
*** Designer            : 佐藤 駿介
*** Date                : 2022.07.04
*** Function            : タグ情報を取得する。
*** Return              : タグ情報の配列
****************************************************************************/

    public function GetTags( Collection $tasks ) // 課題情報の配列
    {
        $tags = new Collection();
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
*** Date                : 2022.07.04
*** Function            : タグ情報の編集処理を行う。
*** Return              : 課題情報
****************************************************************************/

    public function TagEdit( $user_id, // 
                             $tag_id, // 
                             String $name ) // 
    {
        $tasks = $this->TagDelete($user_id, $tag_id);
        $tag_id = $this->TagRegister([$name]);
        $tag = Tag::find($tag_id)->first();
        foreach($tasks as $task)
        {
            $task->tags()->attach($tag);
            $task->tags()->sync($task->tags->unique('id'));
        }
        return $tasks;
    }

/****************************************************************************
*** Function Name       : TagDelete( $user_id, $tag_id )
*** Designer            : 長尾 理生
*** Date                : 2022.07.04
*** Function            : タグ情報の削除処理を行う。
*** Return              : なし
****************************************************************************/

    public function TagDelete( $user_id, // アカウント情報のID
                               $tag_id ) // タグ情報のID
    {
        $tag = Tag::find($tag_id);
        $tasks = $tag->tasks;
        $tasks = $tasks->where('user_id',$user_id);
        foreach($tasks as $task)
        {
            $task->tags()->detach($tag);
        }
        return $tasks;
    }
}
