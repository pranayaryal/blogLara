<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function allPosts()
    {
        return response()->json(Post::all());
    }
}
