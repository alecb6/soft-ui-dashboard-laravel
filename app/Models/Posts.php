<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['name', 'description', 'user_id'];
    protected $casts = [
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPosts()
    {
        $posts = self::where('user_id', Auth::user()->id)->get();

        foreach ($posts as $post) {
            $postsArray[] = array(
                "name" => $post->name,
                "description" => $post->description,
            );
        }

        return $postsArray;
    }
}
