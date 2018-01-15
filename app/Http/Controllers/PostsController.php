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
        $authors = \App\User::all();
        $action = '/post';
        return view('posts.form', compact('action', 'authors', 'categoryOptions', 'post', 'statusOptions'));
    }

    public function index()
    {
        $posts = Post::where('status_id', Status::PUBLISHED)->with(['category', 'author.profile'])->orderBy('created_at', 'DESC');
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        // return $this->Post->singlePost($post);
        $full_content = true;
        $post = Post::whereSlug($slug)->with(['category', 'author'])->firstOrFail();
        $description = !empty($post->seo_description) ? $post->seo_description : strip_tags($post->excerpt);
        $title = !empty($post->seo_title) ? $post->seo_title : $post->title . ' | Posted in ' . $post->category->name . ' | Doe-Anderson';
        return view('posts.show', compact('post', 'full_content', 'description', 'title'));
    }

    public function edit(Post $post)
    {
        $post = $post->load(['author', 'category', 'status']);
        $action = '/posts/' . $post->id . '/edit';
        $categoryOptions = \App\Category::all();
        $statusOptions = \App\Status::all();
        $authors = \App\User::all();
        return view('posts.form', compact('action', 'categoryOptions', 'post', 'statusOptions', 'authors'));
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
        $post->seo_title = request('seo_title');
        $post->seo_description = request('seo_description');
        $post->canonical = !empty(request('canonical')) ? 1 : null;
        $post->vimeo_id = request('vimeo_id');

        if (isset(request()->all()['featured_image']) && !empty(request()->all()['featured_image'])) {
            $image = request()->all()['featured_image'];
        }

        try {
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
            return redirect()->back();
        }

        return redirect('/');
    }

    // Views
    public function admin()
    {
        $posts = Post::with(['author', 'category', 'status'])->get();
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
