<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'picture',
        'bio',
        'facebook_url',
        'gitlab_url',
        'twitter_url',
    ];
}
