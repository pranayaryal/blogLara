<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($query) {
        $results = [];
        
        $results[] = \App\Post::search($query)->get();
        $results[] = \App\Profile::search($query)->get();
    
        return $results;
    }
}
