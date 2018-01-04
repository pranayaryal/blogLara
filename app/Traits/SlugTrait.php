<?php

namespace App\Traits;

trait SlugTrait
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (isset($model->title)) {
                $model->slug = str_slug($model->title);
            }

            if (isset($model->user->name)) {
                $model->slug = str_slug($model->user->name);
            }

            $latestSlug =
                static::whereRaw("slug RLIKE '^{$model->slug}(-[0-9]*)?$'")
                    ->latest('id')
                    ->pluck('slug');

            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $number > 0 ? $model->slug .= '-' . ($number + 1) : '';
        });
    }
}
