<?php

namespace App\Http\Controllers\Task;

use App\Models\Tag;

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
        foreach ($tag_names as $name) {
            $tag = Tag::where('name',$name)->first();
            if ($tag != null) {
                $tags[] = $tag->id;
            } else {
                $tags[] = $this->TagCreate($name)->id;
            }
        }
        return $tags;
    }
}