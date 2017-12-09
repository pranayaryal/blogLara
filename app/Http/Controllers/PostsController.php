<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Status;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(Post $post)
    {
        $categoryOptions = \App\Category::all();
        $statusOptions = \App\Status::all();
        $action = '/post';
        return view('posts.form', compact('action', 'categoryOptions', 'post', 'statusOptions'));
    }

    public function index()
    {
        $posts = Post::where('status_id', Status::PUBLISHED)->with(['category', 'author'])->get();
        return view('posts.index', compact('posts', 'full_content'));
    }

    public function show($slug)
    {
        // return $this->Post->singlePost($post);
        $no_link = true;
        $full_content = true;
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('posts.show', compact('post', 'no_link', 'full_content'));
    }

    public function edit(Post $post)
    {
        $post = $post->load(['author', 'category', 'status']);
        $action = '/posts/' . $post->id . '/edit';
        $categoryOptions = \App\Category::all();
        $statusOptions = \App\Status::all();
        return view('posts.form', compact('action', 'categoryOptions', 'post', 'statusOptions'));
    }

    public function store(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'excerpt' => 'required'
        ]);

        if (!empty(request('id'))) {
            $post = $post->find(request('id'));
        }

        $post->category_id = request('category_id');
        $post->content = request('content');
        $post->excerpt = request('excerpt');
        $post->status_id = request('status_id');
        $post->title = request('title');
        $post->user_id = request('user_id');

        if (isset(request()->all()['featured_image']) && !empty(request()->all()['featured_image'])) {
            $image = request()->all()['featured_image'];
        }

        try {
            $post->featured_image = '';

            if (isset(request()->all()['featured_image']) && !empty(request()->all()['featured_image'])) {
                $path = '/images/posts/' . $post->id . '/featured';
                $image->move(public_path() . $path, $image->getClientOriginalName());
                $post->featured_image = $path . '/' . $image->getClientOriginalName();
            }

            $post->save();

            return redirect('/');
        } catch (Expression $e) {
            dd($e);
        }
    }

    public function delete(Post $post)
    {
        if (!$post->delete()) {
            return response()->json('Error: Post not deleted');
        }

        return response()->json('Post deleted');
    }

    // Views
    public function admin()
    {
        $posts = Post::where('user_id', auth()->user()->id)->with(['author', 'category', 'status'])->get();
        return view('posts.admin', compact('posts'));
    }

    // Api Section
    public function allPosts()
    {
        return $this->Post->allPosts();
    }

    public function publishedPosts()
    {
        return $this->Post->publishedPosts();
    }

    public function getPost($id)
    {
        return $this->Post->singlePost($id);
    }

    public function savePost(Request $request)
    {
        return $this->Post->createPost($request);
    }

    public function updatePost(Request $request)
    {
        return $this->Post->editPost($request);
    }

    // public function delete($id)
    // {
    //     return $this->Post->deletePost($id);
    // }


    public function getCategory($category_id)
    {
        return $this->Post->postsByCategory($category_id);
    }

    public function getCategories()
    {
        return $this->Category->allCategories();
    }

    public function getStatuses()
    {
        return $this->Status->allStatuses();
    }
}
