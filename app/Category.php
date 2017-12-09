<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SlugTrait;

class Category extends Model
{
    use SlugTrait;

    const DESIGN = 13;
    const DEVELOPMENT = 14;
    const PROCESS = 15;
    const RANDOM = 16;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function allCategories()
    {
        return response()->json(Category::all());
    }
}
