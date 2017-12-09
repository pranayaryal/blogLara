<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($slug)
    {
        $profile = Profile::whereSlug($slug)->firstOrFail();
        $posts = \App\Post::where('user_id', $profile->user_id)->where('status_id', \App\Status::PUBLISHED)->with(['category', 'author'])->get();
        return view('profile.show', compact(['profile', 'posts']));
    }

    public function create(Profile $profile)
    {
        $user = auth()->user();
        $profile = $profile->firstOrNew(['user_id' => auth()->user()->id]);
        $profile->user()->associate($user);
        return view('profile.form', compact('profile'));
    }

    public function store(Profile $profile)
    {
        $this->validate(request(), [
            'bio' => 'required',
            'title' => 'required',
        ]);

        $user = auth()->user();
        $user->name = request('name');


        if (!empty(request('user_id'))) {
            $profile = $profile->where('user_id', request('user_id'))->first();
        }

        $profile->user()->associate($user);

        $profile->title = request('title');
        $profile->bio = request('bio');
        $profile->avatar = request('avatar');
        $profile->twitter = request('twitter');
        $profile->instagram = request('instagram');
        $profile->dribbble = request('dribbble');
        $profile->github = request('github');

        try {
            $profile->save();
            $user->save();
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->action(
            'ProfileController@show',
            ['id' => $profile->id]
        );
    }

    // API
    public function getProfile(Request $request)
    {
        return response()->json([
            'user' => Auth::user(),
            'bio' => 'I created Twitter, Facebook, and Beanie Babies all before I turned 30. You should definitely listen to everything I write and shit.',
            'avatar' => 'https://avatars2.githubusercontent.com/u/2627466?v=3&s=460',
            'twitter' => 'https://twitter.com/zachhornsby',
            'instagram' => 'https://www.instagram.com/zachhornsby/',
            'dribbble' => 'https://dribbble.com/zachhornsby',
            'github' => 'https://github.com/zachhornsby'
        ]);
    }

    public function saveProfile()
    {
        // Todo
    }
}
