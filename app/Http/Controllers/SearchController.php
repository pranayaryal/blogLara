<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        $query = request('query');
        $posts = \App\Post::search($query)->get();
        $profiles = \App\Profile::search($query)->get();

        $results = collect($posts, $profiles);
    
        return view('search.results', compact('results', 'query'));
    }
}
