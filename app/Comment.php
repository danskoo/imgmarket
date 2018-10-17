<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body', 'image_id'
    ];
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
