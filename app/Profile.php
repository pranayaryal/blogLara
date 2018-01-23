<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use App\Traits\SlugTrait;

class Profile extends Model
{
    use Notifiable, Searchable, SlugTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'bio', 'twitter', 'instagram', 'github', 'dribbble', 'title', 'first_name', 'last_name'
    ];
}
