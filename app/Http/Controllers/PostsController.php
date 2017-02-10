<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Status;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->Category = new Category();
        $this->Post = new Post();
        $this->Status = new Status();
    }

    // Views
    public function admin()
    {
        return view('posts.admin');
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

    public function savePost(Request $request)
    {
        return $this->Post->createPost($request);
    }

    public function updatePost(Request $request)
    {
        return $this->Post->editPost($request);
    }

    public function delete($id)
    {
        return $this->Post->deletePost($id);
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
