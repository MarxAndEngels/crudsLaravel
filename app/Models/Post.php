<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedPost()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
