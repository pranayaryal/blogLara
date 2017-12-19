<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($slug)
    {
            $profile = Profile::whereSlug($slug)->with('user')->firstOrFail();
            $posts = \App\Post::where('user_id', $profile->user_id)->where('status_id', \App\Status::PUBLISHED)->with(['category', 'author'])->get();
            $description = !empty($profile->bio) ? strip_tags($profile->bio) : $profile->user->name . ' - ' . $profile->title;
            $title = $profile->user->name . ' | ' . $profile->title . ' | ' . 'Doe-Anderson';
            return view('profile.show', compact(['profile', 'posts', 'description', 'title']));
    }

    public function create(Profile $profile)
    {
        try {
            $user = auth()->user();
            $profile = $profile->firstOrNew(['user_id' => auth()->user()->id]);
            $profile->user()->associate($user);
            return view('profile.form', compact('profile'));
        } catch (Exception $e) {
            dd($e);
        }
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

        if (isset(request()->all()['avatar']) && !empty(request()->all()['avatar'])) {
            $image = request()->all()['avatar'];
        }

        $profile->user()->associate($user);

        $profile->title = request('title');
        $profile->bio = request('bio');
        $profile->twitter = request('twitter');
        $profile->instagram = request('instagram');
        $profile->dribbble = request('dribbble');
        $profile->github = request('github');

        try {
            $profile->avatar = '';

            if (isset(request()->all()['avatar']) && !empty(request()->all()['avatar'])) {
                $path = '/images/profile/' . $profile->slug . '/avatar';
                $image->move(public_path() . $path, $image->getClientOriginalName());
                $profile->avatar = $path . '/' . $image->getClientOriginalName();
            }

            $profile->save();
            $user->save();
        } catch (Exception $e) {
            dd($e);
        }

        return redirect()->action(
            'ProfileController@show',
            ['slug' => $profile->slug]
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
