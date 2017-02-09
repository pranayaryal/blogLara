<?php

namespace App;

use App\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'created_at', 'content', 'featured_image', 'category_id', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'id',
    ];

    public function publishedPosts()
    {
        return response()->json(Post::where(['status_id' => STATUS::PUBLISHED])->get());
    }

    public function allPosts()
    {
        return response()->json(Post::all());
    }

    public function createPost($request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $request->featured_image,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id
        ]);

        return response()->json(['data' => $post]);
    }

    public function editPost($request)
    {
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->featured_image = $request->featured_image;
        $post->status_id = $request->status_id;
        $post->category_id = $request->category_id;

        if (!$post->save()) {
            return response()->json(['Error saving post']);
        }

        return response()->json(['Post saved']);
    }
}
