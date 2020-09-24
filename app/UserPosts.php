<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class UserPosts extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $randomWord = Uuid::generate()->string;
            $model->uuid = substr($randomWord, 0 ,8);
        });
    }

    public function getUserPost($postId)
    {
        return self::where('post_id', $postId)->get();
    }
}
