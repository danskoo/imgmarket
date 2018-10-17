<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'title', 'img'
    ];

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function addcomments($body)
    {
        $this->Comments()->create(compact('body'));
        //Comment::create(['body' =>$body, 'image_id' =>$this->id]);
    }
}
