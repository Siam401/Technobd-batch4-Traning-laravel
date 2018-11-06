<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['tag_ids'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
