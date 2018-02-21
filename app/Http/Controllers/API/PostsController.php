<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Post;
use App\Status;
use App\Profile;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{
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