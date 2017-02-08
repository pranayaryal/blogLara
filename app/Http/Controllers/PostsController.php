<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->Post = new Post();
    }

    // Views
    public function admin()
    {
        return view('posts.admin');
    }

    // Api Section
    public function posts()
    {
        return $this->Post->allPosts();
    }

    public function getCategories()
    {
        return response()->json(Category::all());
    }

    public function savePost(Request $request)
    {
        return $this->Post->createPost($request);
    }
}
