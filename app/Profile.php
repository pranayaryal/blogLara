<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Profile extends Model
{
    use Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'bio', 'twitter', 'instagram', 'github', 'dribbble', 'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFirstNameAttribute()
    {
        $pieces = explode(' ', $this->user->name, 2);
        return $pieces[0];
    }

    public function getLastNameAttribute()
    {
        $pieces = explode(' ', $this->user->name, 2);
        return $pieces[1];
    }
}
