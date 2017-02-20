<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const ARCHIVE = 1;
    const DRAFT = 2;
    const PUBLISHED = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function allStatuses()
    {
        return response()->json(Status::all());
    }
}
