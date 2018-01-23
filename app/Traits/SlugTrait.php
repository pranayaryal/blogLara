<?php

namespace App\Traits;

trait SlugTrait
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
          $model->slug = str_slug($model->title);

          // Override slug for profiles
          if (isset($model->first_name) && isset($model->last_name)) {
            $model->slug = str_slug($model->first_name) . '-' . str_slug($model->last_name);
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
