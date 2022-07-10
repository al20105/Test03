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

    public function TagRegister($data) {
        $tags = null;
        if ($data!=null) {
            $tag_names = array_unique($data);
            foreach ($tag_names as $name) {
                if ($name!=null && !preg_match('/#/',$name)) {
                    $tag = Tag::where('name',$name)->first();
                    if ($tag != null) {
                        $tags[] = $tag->id;
                    } else {
                        $tags[] = $this->TagCreate($name)->id;
                    }
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

    public function TagEdit($user_id, $tag_id, String $name) {
        $tasks = null;
        $id = $this->TagRegister([$name]);
        if ($id != null) {
            $tasks = $this->TagDelete($user_id, $tag_id);
            $tag = Tag::find($id)->first();
            foreach($tasks as $task){
                $task->tags()->attach($tag);
                $task->tags()->sync($task->tags->unique('id'));
            }
        }
        return $tasks;
    }

    public function TagDelete($user_id, $tag_id) {
        $tag = Tag::find($tag_id);
        $tasks = $tag->tasks;
        $tasks = $tasks->where('user_id',$user_id);
        foreach($tasks as $task){
            $task->tags()->detach($tag);
        }
        return $tasks;
    }
}