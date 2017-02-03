<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function getProfile(Request $request)
    {
        return response()->json([
            'user' => Auth::user(),
            'bio' => 'I created Twitter, Facebook, and Beanie Babies all before I turned 30. You should definitely listen to everything I write and shit.',
            'avatar' => 'https://avatars2.githubusercontent.com/u/2627466?v=3&s=460',
            'twitter' => 'https://twitter.com/zachhornsby',
            'instagram' => 'https://www.instagram.com/zachhornsby/'
        ]);
    }

    public function saveProfile()
    {
        // Todo
    }
}
