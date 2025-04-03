<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
