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

        $title = 'Searching results for: ' . $query . ' | Doe-Anderson';
    
        return view('search.results', compact('results', 'query', 'title'));
    }
}
