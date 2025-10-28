<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{


    protected $fillable = ['title','description', 'video_path', 'status','category_id','module_id','price','created_by','slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $slug = Str::slug($course->title);
            $count = Course::where('slug', 'like', "{$slug}%")->count();
            $course->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($course) {
            $slug = Str::slug($course->name);
            $count = Course::where('slug', 'like', "{$slug}%")->where('id', '!=', $course->id)->count();
            $course->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
