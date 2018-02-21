<?php

namespace App;

use App\Category;
use App\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SlugTrait;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use SlugTrait, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'created_at', 'content', 'featured_image', 'category_id', 'seo_title', 'seo_description', 'status_id', 'canonical', 'vimeo_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function author()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }

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

    public function singlePost($post)
    {
        if (is_integer($post)) {
            return $this->singlePostById($post);
        }

        return response()->json($post);
    }

    public function singlePostById($id)
    {
        return response()->json(Post::find($id));
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

        if ($returnJson) {
            return response()->json(['data' => $post]);
        }
        return response()->json(['data' => $post]);

        // try {

        // } catch (Exception $e) {

        // }
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

    public function createSlug($title)
    {
      $slug = str_slug($title);
      
      $latestSlug =
        static::whereRaw("slug RLIKE '^{$slug}(-[0-9]*)?$'")
            ->latest('id')
            ->pluck('slug');

      $pieces = explode('-', $latestSlug);
      $number = intval(end($pieces));
      return $number > 0 ? $slug .= '-' . ($number + 1) : '';
    }
}
