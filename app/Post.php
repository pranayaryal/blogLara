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

    public function publishedPosts()
    {
        return response()->json(Post::where(['status_id' => STATUS::PUBLISHED])->get());
    }

    public function postsByCategory($category_id)
    {
        return response()->json(Post::where(['category_id' => $category_id])->get());
    }

    public function allPosts()
    {
        return response()->json(Post::all());
    }

    public function singlePost($post_id)
    {
        return response()->json(Post::find($post_id));
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

    public function deletePost($id)
    {
        $post = Post::find($id);

        if (!$post->delete()) {
            return response()->json('Error: Post not deleted');
        }

        return response()->json('Post deleted');
    }
}
