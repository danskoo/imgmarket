<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class popularity extends Model
{
    protected $fillable = ['ip','count'];
}
