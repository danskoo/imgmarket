<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Comment;

class CommentController extends Controller
{
    public function store(Image $image)
    {
        $this->validate(request(),['body'=>'required|min:10']);
        $image->addcomments(request('body'));
        return back();
    }
}
