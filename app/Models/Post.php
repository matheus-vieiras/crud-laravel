<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public static function listAndSearch()
    {
        $search = request()->query('s');
        return ($search) ?
            Post::where('title', 'like', "%{$search}%")->orWhere('content', 'like', "%{$search}%")->with('author')->paginate(20) :
            Post::with('author')->paginate(20);
    }
}


