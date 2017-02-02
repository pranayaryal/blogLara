<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function getProfile(Request $request)
    {
        return response()->json([
            'bio' => 'I created Twitter, Facebook, and WhatsApp all before I turned 30. You should definitely listen to everything I write and shit.',
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
