<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
    public function comments(){
     return $this->hasMany(Comment::class);   
    }
    public function user(){
     return $this->belongsTo(User::class);   
    }
    protected $fillable =['user_id','title', 'body', 'image_path'];
}
