<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title', 'created_by', 'updated_by'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
