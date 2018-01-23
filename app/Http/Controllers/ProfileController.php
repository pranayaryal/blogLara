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
      $posts = \App\Post::where('user_id', $profile->user_id)->where('status_id', \App\Status::PUBLISHED)->with(['category', 'author'])->orderBy('created_at', 'DESC')->get();
      $description = !empty($profile->bio) ? strip_tags($profile->bio) : $profile->user->name . ' - ' . $profile->title;
      $title = $profile->full_name . ' | ' . $profile->title . ' | ' . 'Doe-Anderson';
      return view('profile.show', compact(['profile', 'posts', 'description', 'title']));
    }

    public function create(Profile $profile)
    {
      return view('profile.form')
        ->withProfile($profile);
    }

    public function edit(Profile $profile)
    {
      return view('profile.form')
        ->withProfile($profile);
    }

    public function store(Profile $profile)
    {
        $this->validate(request(), [
          'first_name' => 'required',
          'last_name' => 'required',
          'bio' => 'required',
          'title' => 'required',
        ]);

        if (isset(request()->all()['avatar']) && !empty(request()->all()['avatar'])) {
            $image = request()->all()['avatar'];
        }

        $profile->first_name = request('first_name');
        $profile->last_name = request('last_name');
        $profile->title = request('title');
        $profile->bio = request('bio');
        $profile->twitter = request('twitter');
        $profile->instagram = request('instagram');
        $profile->dribbble = request('dribbble');
        $profile->github = request('github');

        try {
          if (isset(request()->all()['avatar']) && !empty(request()->all()['avatar']) && !empty($profile->id)) {
            $path = '/images/profile/' . $profile->slug . '/avatar';
            $image->move(public_path() . $path, $image->getClientOriginalName());
            $profile->avatar = $path . '/' . $image->getClientOriginalName();
          } else {
            $profile->save();
            $profile = $profile->orderBy('created_at', 'desc')->first();
            $path = '/images/profile/' . $profile->slug . '/avatar';
            $image->move(public_path() . $path, $image->getClientOriginalName());
            $profile->avatar = $path . '/' . $image->getClientOriginalName();
          }

            $profile->save();
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
