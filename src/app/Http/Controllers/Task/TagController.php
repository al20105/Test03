<?php

namespace App\Http\Controllers\Task;

use App\Models\Tag;
use Illuminate\Support\Collection;

trait TagController
{
    public function TagCreate(String $name) {
        $tag = new Tag;
        $tag->name = $name;
        $tag->save();
        return $tag;
    }

    public function TagRegister(array $data) {
        $tag_names = array_unique($data);
        $tags = null;
        foreach ($tag_names as $name) {
            if ($name!=null) {
                $tag = Tag::where('name',$name)->first();
                if ($tag != null) {
                    $tags[] = $tag->id;
                } else {
                    $tags[] = $this->TagCreate($name)->id;
                }
            }
        }
        return $tags;
    }

    public function GetTags(Collection $tasks) {
        $tags = new Collection();
        foreach($tasks as $task){
            foreach($task->tags as $tag) {
                $tags->add($tag);
            }
        }
        return $tags->unique('id');
    }
}