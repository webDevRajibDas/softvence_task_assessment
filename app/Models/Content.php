<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'module_id',
        'title',
        'video',
        'video_thumbnail',
        'image',
        'external_url',
        'status'
    ];


    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
